<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include "./../Db.php";
$db= Db::getDb();
$sql = "select * from tblcountry";
$result= $db->con->query($sql);
if(!$db->con->error){
    $data['countries']=[];
if($result->num_rows>0){
    while($row= $result->fetch_assoc()){
        
        $country=[
            'id'=>$row['nCountryId'],
            'name'=>$row['cCountryName']
        ];
        array_push($data['countries'],$country);
    }
    http_response_code(200);
    echo json_encode($data);
}
else{
    http_response_code(404);
    echo json_encode(['data'=>'no data found']);
}

}
else{
    http_response_code(500);
    echo json_encode(['message'=>"server problem/error"]);
}
$db->close();
