<?php
    require_once('tcpdf/tcpdf.php');
    // create new PDF document
    $pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Book Ordering SYstem');
    $pdf->SetTitle('Orders Report');
    // $pdf->SetSubject('');
    // $pdf->SetKeywords('');
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $pdf->SetDefaultMonospacedFont('helvetica');
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetAutoPageBreak(TRUE, 10);
    $pdf->SetFont('helvetica', '', 11);
    $pdf->AddPage();
    $html = '
            <h3 style="margin-top: 30px; text-align: center;">Orders Report</h3>
            <hr>
            <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Address</th>
                                <th>Contact Number</th>
                                <th>Placed at</th>
                            </tr>
                            <tr><th></th></tr>
                        </thead>
                    <tbody>';
include 'dbconnection.php';
                                
if (isset($_GET['search'])) {
$filtervalue = $_GET['search'];
    $print_data = mysqli_query($conn, "SELECT * from orders where concat( name,quantity,totalPrice,address,phoneNum,placed_at) like '%$filtervalue%'");
   if($print_data->num_rows > 0){
        while ($row = mysqli_fetch_assoc($print_data)) {
        $html .='<tr>
        <td>'.$row['id'].'</td>
        <td>'.$row['name'].'</td>
        <td>'.$row['quantity'].'</td>
        <td>'.$row['totalPrice'].'</td>
        <td>'.$row['address'].'</td>
        <td>'.$row['phoneNum'].'</td>
        <td>'.$row['placed_at'].'</td>
        </tr>';
  }
}  
} 
else if(isset($_POST['ids'])){
     $id = $_POST['ids'];
     foreach ($id as $key => $value) {  
         $print_data=mysqli_query($conn, "select * from orders where id = {$value} ");
         while ($row = mysqli_fetch_array($print_data)) {
             $html .='<tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['quantity'].'</td>
            <td>'.$row['totalPrice'].'</td>
            <td>'.$row['address'].'</td>
            <td>'.$row['phoneNum'].'</td>
            <td>'.$row['placed_at'].'</td>
            </tr>';
           }
       }
 }
 else{
     $print_data=mysqli_query($conn, "select * from orders");
      while ($row = mysqli_fetch_array($print_data)) {
             # code...
         $html .='<tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['quantity'].'</td>
            <td>'.$row['totalPrice'].'</td>
            <td>'.$row['address'].'</td>
            <td>'.$row['phoneNum'].'</td>
            <td>'.$row['placed_at'].'</td>
         </tr>';
     }
 }
                $html .='
                    </tbody>
                    </table>
';
    // writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
    // $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->writeHTML($html);
    $pdf->Output('samplereport.pdf', 'I');
?>
