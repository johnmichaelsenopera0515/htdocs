<?php 
    require '../vendor/autoload.php';
	include 'includes/session.php';
    use PhpOffice\PhpSpreadsheet\IOFactory;


    if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
        // Check if a file was uploaded
        if (isset($_FILES['excelFile']) && $_FILES['excelFile']['error'] === UPLOAD_ERR_OK) {
            // Temporary file path
            $tmpFilePath = $_FILES['excelFile']['tmp_name'];
    
            // Load the Excel file
            $spreadsheet = IOFactory::load($tmpFilePath);
            $worksheet = $spreadsheet->getActiveSheet();
    
            $first_row = 0;


            // Iterate through rows and insert data into the database
            foreach ($worksheet->getRowIterator() as $row) {
                if($first_row == 0){
                    $first_row = 1;
                }else{
                    $rowData = [];
                        foreach ($row->getCellIterator() as $cell) {
                            $rowData[] = $cell->getValue();
                        }
            
                        $conn = $pdo->open();
        
                        $now = date('Y-m-d'); 
                        $password = password_hash($rowData[1], PASSWORD_DEFAULT);
        
                        //generate code
                        $set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $code=substr(str_shuffle($set), 0, 12); 
                    
                        try{ 
                            $stmt = $conn->prepare("SELECT count(id) as count FROM users a WHERE a.email=:email and (a.firstname=:firstname and a.lastname=:lastname)");
                            $stmt->execute(['email'=>$rowData[0],'firstname'=>$rowData[2],'lastname'=>$rowData[3]]);
                            
                            $count = 0;
            
                            foreach($stmt as $crow){
                                $count = $crow['count'];
                            }
            
        
                            if($count == 0){
                                $stmt = $conn->prepare("INSERT INTO users (type, company ,email, password, firstname, lastname, created_on, status, address, contact_info) VALUES (:type, :company, :email, :password, :firstname, :lastname, :now, 1, :address, :contact_info)");
                                $stmt->execute(['type'=>3,'company'=>$seller['company'],'email'=>$rowData[0], 'password'=>$password, 'firstname'=>$rowData[2], 'lastname'=>$rowData[3], 'now'=>$now, 'address'=>$rowData[4], 'contact_info'=>$rowData[5]]);
                            } 
                        
                        }
                        catch(PDOException $e){
                            $_SESSION['error'] = $e->getMessage();
                            header('location: register.php');
                        }
        
                        $pdo->close(); 
                } 
                $_SESSION['success'] = 'Employees successfully Added';
            }
        } else { 
            $_SESSION['error'] =  'No file uploaded or an error occurred.';
        }
    }

	header('location: employee.php');

?>