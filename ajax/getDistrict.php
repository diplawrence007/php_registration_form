<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include "./../Db.php";
$db= Db::getDb();
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$countryId= isset($queries['nPresentCountry'])?$queries['nPresentCountry']:null;
$sql = "select * from tblDistrict where nCountryId = '$countryId'";
if( !count($queries)){
    $sql = "select * from tblDistrict";
}
$result= $db->con->query($sql);
if(!$db->con->error){
    $data['districts']=[];
if($result->num_rows>0){
    while($row= $result->fetch_assoc()){
        
        $district=[
            'id'=>$row['nDistrictId'],
            'name'=>$row['cDistrictName'],
            'country_id'=>$row['nCountryId']
        ];
        array_push($data['districts'],$district);
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