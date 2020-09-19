<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include "./../Db.php";
$db= Db::getDb();
// nProfessionCategory
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$categoryId= isset($queries['nProfessionCategory'])?$queries['nProfessionCategory']:null;
if(!$categoryId){
    http_response_code(400);
    echo json_encode([
        'message'=>"please pass categoryId",
        'key'=>'categoryId',
        'queryPass'=>queries
        ]);
}
else{
    $sql = "select * from tblsubcategory where nCategoryId = '$categoryId'";

$result= $db->con->query($sql);
if(!$db->con->error){
    $data['professionSubCategories']=[];
    if($result->num_rows>0){
    while($row= $result->fetch_assoc()){
        
        $subProfession=[
            'id'=>$row['nSubcategoryId'],
            'name'=>$row['cSubcategoryName'],
            'professionId'=>$row['nCategoryId']
        ];
        array_push($data['professionSubCategories'],$subProfession);
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