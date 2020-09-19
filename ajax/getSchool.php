<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include "./../Db.php";
$db= Db::getDb();
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$districtId= isset($queries['nDistrictId'])?$queries['nDistrictId']:null;
if(!$districtId){
    http_response_code(400);
    echo json_encode([
        'message'=>"please pass districtId",
        'key'=>'districtId',
        "send"=>$queries
        ]);
}
else{
    $sql = "select * from tblschool where nDistrictId='$districtId'";
$result= $db->con->query($sql);
if(!$db->con->error){
    $data['schools']=[];
    if($result->num_rows>0){
    while($row= $result->fetch_assoc()){
        
        $school=[
            'id'=>$row['nSchoolId'],
            'name'=>$row['cSchoolName'],
            'districtId'=>$row['nDistrictId']
        ];
        array_push($data['schools'],$school);
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
}
$db->close();