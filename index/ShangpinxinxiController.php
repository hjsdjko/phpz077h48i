<?php




session_start();
class ShangpinxinxiController extends CommonController {

    public function __construct()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
        header('Access-Control-Allow-Headers:Origin,Content-Type,Accept,token,X-Requested-With,device');
    }
    public $columData = [
		'id','addtime'
        ,'shangpinbianhao'
        ,'shangpinmingcheng'
        ,'shangpinfenlei'
        ,'tupian'
        ,'shangpinxiangqing'
        ,'guige'
        ,'alllimittimes'
        ,'shangjiashijian'
        ,'shangjiazhanghao'
        ,'dianpumingcheng'
        ,'clicktime'
        ,'discussnum'
        ,'price'
        ,'storeupnum'
    ];


    /**
     * 分页，列表
     * get
     */
    public function page(){
        $token = $this->token();
        $tokens = json_decode(base64_decode($token),true);
        if (!isset($tokens['id']) || empty($tokens['id'])) exit(json_encode(['code'=>401,'msg'=>"你还没有登录。"]));
        $userid = $tokens['id'];
		$where = " where 1 ";//查询条件
        $orwhere = '';
        
        if($tokens['tablename'] == 'shangjia') {
            $where .= " and `shangjiazhanghao` = '".$tokens['username']."' ";
        }
        if (isset($_REQUEST['pricestart']) && !empty($_REQUEST['pricestart'])) {
            $where .= " and `price` >= '".$_REQUEST['pricestart']. "' ";
        }
        if (isset($_REQUEST['priceend']) && !empty($_REQUEST['priceend'])) {
            $where .= " and `price` <= '".$_REQUEST['priceend']. "' ";
        }
		
        $page = isset($_REQUEST['page'])?$_REQUEST['page']:"1";
        $limt = isset($_REQUEST['limit'])?$_REQUEST['limit']:"10";
        $sort = isset($_REQUEST['sort'])?$_REQUEST['sort']:"id";
        $order = isset($_REQUEST['order'])?$_REQUEST['order']:"asc";
        foreach ($_REQUEST as $k => $val){
			if(in_array($k, $this->columData)){
                if ($val != ''){
                    $where.= " and ".$k." like '".$val."'";
                }
			}
        }
        $base = json_decode(base64_decode($token),true);
        if ($base['isAdmin']!=1 || ($base['isAdmin']==1 && $base['tablename'] != "users")){
            $md5 = md5($userid."+10086");
            $colum = "shangjiazhanghao";
            $columData = $base['columData'];
            if (isset($_SESSION[$md5]) && in_array($colum, $columData)){
                if($base['tablename'] == 'shangjia'){
                    $orsign = false;
                    if(!$orsign) {
                        $where .= " and `shangjiazhanghao` = '".$_SESSION[$md5]."'";
                    }
                }
            }
        }
        
        $sql = "select * from `shangpinxinxi` ".$where;
        $count = table_sql($sql);
        if ($count->num_rows < 1){
            $numberCount = 0;
        }else{
            $numberCount = $count->num_rows;
        }
        $page_count = ceil($numberCount/$limt);//页数
        $startCount = ($page-1)*$limt;
        $where .= empty($orwhere) ? '' : "and (".$orwhere.")";
        $lists = "select * from `shangpinxinxi` ".$where." order by ".$sort." ".$order." limit ".$startCount.",".$limt;
        $result = table_sql($lists);
        $arrayData = array();
        if ($result->num_rows > 0) {
            while ($datas = $result->fetch_assoc()){
                array_push($arrayData,$datas);
            }
        }
        exit(json_encode([
            'code'=>0,
            'data' => [
                "total" => $numberCount,
                "pageSize" => $limt,
                "totalPage" => $page_count,
                "currPage" => $page,
                "list" => $arrayData
            ]
        ]));
    }

        /**
     * 分页，列表list
     * get
     */
    public function lists(){
        $sql = "select * from `shangpinxinxi`";
        $result = table_sql($sql);
        $arrayData = array();
        if ($result->num_rows > 0) {
            while ($datas = $result->fetch_assoc()){
                array_push($arrayData,$datas);
            }
        }
        exit(json_encode([
            'code'=>0,
            'data' =>$arrayData
        ]));
    }
    /**
     * 分页，列表list
     * get
     */
    public function list(){
        $page = isset($_REQUEST['page'])?$_REQUEST['page']:"1";
        $limt = isset($_REQUEST['limit'])?$_REQUEST['limit']:"10";
        $sort = isset($_REQUEST['sort'])?$_REQUEST['sort']:"id";
        $order = isset($_REQUEST['order'])?$_REQUEST['order']:"asc";
        $refid = isset($_REQUEST['refid']) ? $_REQUEST['refid'] : "0";
		$where = " where 1 ";//查询条件
        if(isset($_REQUEST['goodid'])) {
            $where .= " and goodid = ".$_REQUEST['goodid']." ";
        }
        $sorts = explode(",", $sort);
        $orders = explode(",", $order);
        $sortorders = "";
        foreach ($sorts as $index => $value) {
            if($index == count($sorts)-1){
                $sortorders =$sortorders.$value." ".$orders[$index];
            }else{
                $sortorders =$sortorders.$value." ".$orders[$index].",";
            }
        }
        if (isset($_REQUEST['pricestart']) && !empty($_REQUEST['pricestart'])) {
            $where .= " and `price` >= '".$_REQUEST['pricestart']. "' ";
        }
        if (isset($_REQUEST['priceend']) && !empty($_REQUEST['priceend'])) {
            $where .= " and `price` <= '".$_REQUEST['priceend']. "' ";
        }
		foreach ($_REQUEST as $k => $val){
			if(in_array($k, $this->columData)){
				$where.= " and ".$k." like '".$val."'";
			}
        }
        
        $sql = "select * from `shangpinxinxi`".$where;
        $count = table_sql($sql);
        if ($count->num_rows < 1){
            $numberCount = 0;
        }else{
            $numberCount = $count->num_rows;
        }
        $page_count = ceil($numberCount/$limt);//页数
        $startCount = ($page-1)*$limt;
        $lists = "select * from `shangpinxinxi` ".$where." order by ".$sortorders." limit ".$startCount.",".$limt;
        $result = table_sql($lists);
        $arrayData = array();
        if ($result->num_rows > 0) {
            while ($datas = $result->fetch_assoc()){
                array_push($arrayData,$datas);
            }
        }
        exit(json_encode([
            'code'=>0,
            'data' => [
                "total" => $numberCount,
                "pageSize" => $limt,
                "totalPage" => $page_count,
                "currPage" => $page,
                "list" => $arrayData
            ]
        ]));
    }



    /**
     * 新增数据接口
     * post
     */
    public function save(){
        $token = $this->token();
        $tokens = json_decode(base64_decode($token),true);
        if (!isset($tokens['id']) || empty($tokens['id'])) exit(json_encode(['code'=>401,'msg'=>"你还没有登录。"]));
        $uid = $tokens['id'];
        $keyArr = $valArr = array();
        $tmpData = strval(file_get_contents("php://input"));//Content-Type: application/json 需要用到php://input 处理输入流
        
        if (!empty($tmpData)&& isset($tmpData)){
            $postData = json_decode($tmpData,true);
            foreach ($postData as $key => $value){
                if (in_array($key, $this->columData)){
                    if(!empty($value) || $value === 0) {
                        if ($key == 'id') {
                            continue;
                        }
                        array_push($keyArr,"`".$key."`");
                        if($key == 'clicktime') {
                            array_push($valArr,"'".date('Y-m-d h:i:s', time())."'");
                        } else {
                            array_push($valArr,"'".$value."'");
                        }
                    }
                }
            }

    }
        $k = implode(',',$keyArr);
        $v = implode(',',$valArr);
        $sql = "INSERT INTO `shangpinxinxi` (".$k.") VALUES (".$v.")";
        $result = table_sql($sql);
        exit(json_encode(['code'=>0]));
    }
    /**
     * 新增数据接口 add
     * post
     */
    public function add(){
        $keyArr = $valArr = array();
        $token = $this->token();
        $tokens = json_decode(base64_decode($token),true);
        if (!isset($tokens['id']) || empty($tokens['id'])) exit(json_encode(['code'=>401,'msg'=>"你还没有登录。"]));
        $uid = $tokens['id'];

        $tmpData = strval(file_get_contents("php://input"));
        if (!empty($tmpData)&& isset($tmpData)){
            $postData = json_decode($tmpData,true);
            foreach ($postData as $key => $value){
                if (in_array($key, $this->columData)){
                    if(!empty($value) || $value === 0) {
                        if ($key == 'id') {
                            continue;
                        }
                        array_push($keyArr,"`".$key."`");
                        if($key == 'clicktime') {
                            array_push($valArr,"'".date('Y-m-d h:i:s', time())."'");
                        } else {
                            array_push($valArr,"'".$value."'");
                        }
                    }
                }
            }

        }
        $k = implode(',',$keyArr);
        $v = implode(',',$valArr);
        $sql = "INSERT INTO `shangpinxinxi` (".$k.") VALUES (".$v.")";
        $result = table_sql($sql);
        exit(json_encode(['code'=>0]));
    }
    /**
     * 更新接口
     * post
     */
    public function update(){
        $token = $this->token();
        $tokens = json_decode(base64_decode($token),true);
        if (!isset($tokens['id']) || empty($tokens['id'])) exit(json_encode(['code'=>401,'msg'=>"你还没有登录。"]));
        $uid = $tokens['id'];
        $tmpData = strval(file_get_contents("php://input"));
        $postData = json_decode($tmpData,true);
        $v = array();
        foreach ($postData as $key => $value){
            if (in_array($key, $this->columData)){
                if ($key == "id"){
                    $id = $value;
                }
                if(!empty($value) || $value === 0) {
                    array_push($v,$key." = '".$value."'");
                }
            }
        }
        $value = implode(',',$v);
        $sql = "UPDATE shangpinxinxi SET ".$value." where id = ".$id;
        $result = table_sql($sql);

        exit(json_encode(['code'=>0]));
    }
    /**
     * 删除
     * post
     */
    public function delete(){
        $ids = strval(file_get_contents("php://input"));//发现接收的是字符串
        preg_match_all('/\d+/',$ids,$arr);
        $str = implode(',',$arr[0]);//拼接字符，
        $sql = "delete from shangpinxinxi WHERE id in({$str})";
        $result = table_sql($sql);
        exit(json_encode(['code'=>0]));
    }

    // 查询单条记录（前端）
    public function query(){
        $where = "1";
        foreach ($_REQUEST as $k => $val){
		    if(in_array($k, $this->columData) && !empty($val)){
                $where.= " and ".$k." like '".$val."'";
			}
        }
        $sql = "select * from `shangpinxinxi` where ".$where;
        $result = table_sql($sql);
        if ($result->num_rows > 0) {
            // 输出数据
            while($row = $result->fetch_assoc()) {
                $lists = $row;
            }
        }
        exit(json_encode([
            'code'=>0,
            'data'=> $lists
        ]));
    }
    /**
     * 查询一条数据
     * get
     */
    public function info($id=false){

        $token = $this->token();
        $tokens = json_decode(base64_decode($token),true);
        if (!isset($tokens['id']) || empty($tokens['id'])) exit(json_encode(['code'=>401,'msg'=>"你还没有登录。"]));
        $userid = $tokens['id'];
        $name = isset($_REQUEST['name'])? $_REQUEST['name']:"";
        if (!empty($id)){
            $where = "`id` = ".$id;
        }else{
            $where = "`name` = ".$name;
        }
        $sql = "select * from `shangpinxinxi` where ".$where;
        $result = table_sql($sql);
        if ($result->num_rows > 0) {
            // 输出数据
            while($row = $result->fetch_assoc()) {
                $lists = $row;
            }
        }
        exit(json_encode([
            'code'=>0,
            'data'=> $lists
        ]));
    }
    /**
     * 查询一条数据
     * get
     */
    public function detail($id=false){
        $name = isset($_REQUEST['name'])? $_REQUEST['name']:"";
        if ($id){
            $where = "`id` = ".$id;
        }else{
            $where = "`name` = ".$name;
        }
        $sql = "select * from `shangpinxinxi` where ".$where;
        $result = table_sql($sql);
        if (!$result) exit(json_encode(['code'=>500,'msg'=>"查询数据发生错误。"]));
        if ($result->num_rows > 0) {
            // 输出数据
            while($row = $result->fetch_assoc()) {
                $lists = $row;
            }
        }
        exit(json_encode([
            'code'=>0,
            'data'=> $lists
        ]));
    }

    /**
     * 按值统计接口
     **/
    public function value(){
        $url = explode('?',$_SERVER['REQUEST_URI']);
        $request = explode('/',$url[0]);
        $xColumnName = $request[4];
        $yColumnName = $request[5];
        $token = $this->token();
        $tokens = json_decode(base64_decode($token),true);
        $where = " where 1 ";
        if($tokens['isAdmin'] != 1 && $tokens['tablename'] == 'shangjia') {
            $where .= " and `shangjiazhanghao` = '".$tokens['username']."' ";
        }
        $sql = "SELECT ".$xColumnName.",sum(".$yColumnName.") total FROM shangpinxinxi ".$where." group by ".$xColumnName;
        if(urldecode($request[6]) == '日') {
            $sql = "SELECT DATE_FORMAT(".$xColumnName.", '%Y-%m-%d') ".$xColumnName.", sum(".$yColumnName.") total FROM shangpinxinxi ".$where."  GROUP BY DATE_FORMAT(".$xColumnName.", '%Y-%m-%d')";
        }
        if(urldecode($request[6]) == '月') {
            $sql = "SELECT DATE_FORMAT(".$xColumnName.", '%Y-%m') ".$xColumnName.", sum(".$yColumnName.") total FROM shangpinxinxi ".$where."  GROUP BY DATE_FORMAT(".$xColumnName.", '%Y-%m')";
        }
        if(urldecode($request[6]) == '年') {
            $sql = "SELECT DATE_FORMAT(".$xColumnName.", '%Y') ".$xColumnName.", sum(".$yColumnName.") total FROM shangpinxinxi ".$where."  GROUP BY DATE_FORMAT(".$xColumnName.", '%Y')";
        }
        $result = table_sql($sql);
        if ($result->num_rows > 0) {
            // 输出数据
            $total = array();
            while($row = $result->fetch_assoc()) {
                array_push($total,array('total' => intval($row['total']),$xColumnName => $row[$xColumnName]));
            }
        }
        exit(json_encode(['code'=>0,'data'=>$total]));
    }

    /**
     * (按值统计）时间统计类型(多)
     **/
    public function valueMul(){
        $url = explode('?',$_SERVER['REQUEST_URI']);
        $request = explode('/',$url[0]);
        $xColumnName = $request[4];
        $yColumnName = isset($_REQUEST['yColumnNameMul'])? $_REQUEST['yColumnNameMul']:"";
        $token = $this->token();
        $tokens = json_decode(base64_decode($token),true);
        $where = " where 1 ";
        if($tokens['isAdmin'] != 1 && $tokens['tablename'] == 'shangjia') {
            $where .= " and `shangjiazhanghao` = '".$tokens['username']."' ";
        }
        $valueData = array();

        foreach(explode(",", $yColumnName) as $item){
            $sql = "SELECT ".$xColumnName.",sum(".$item.") total FROM shangpinxinxi ".$where." group by ".$xColumnName." LIMIT 10";
            if(urldecode($request[6]) == '日') {
                $sql = "SELECT DATE_FORMAT(".$xColumnName.", '%Y-%m-%d') ".$xColumnName.", sum(".$item.") total FROM shangpinxinxi ".$where."  GROUP BY DATE_FORMAT(".$xColumnName.", '%Y-%m-%d') LIMIT 10";
            }
            if(urldecode($request[6]) == '月') {
                $sql = "SELECT DATE_FORMAT(".$xColumnName.", '%Y-%m') ".$xColumnName.", sum(".$item.") total FROM shangpinxinxi ".$where."  GROUP BY DATE_FORMAT(".$xColumnName.", '%Y-%m') LIMIT 10";
            }
            if(urldecode($request[6]) == '年') {
                $sql = "SELECT DATE_FORMAT(".$xColumnName.", '%Y') ".$xColumnName.", sum(".$item.") total FROM shangpinxinxi ".$where."  GROUP BY DATE_FORMAT(".$xColumnName.", '%Y') LIMIT 10";
            }
            $result = table_sql($sql);
            if ($result->num_rows > 0) {// 输出数据
                $total = array();
                while($row = $result->fetch_assoc()) {
                    array_push($total,array('total' => intval($row['total']),$xColumnName => $row[$xColumnName]));
                }
                $valueData[] = $total;
            }
        }

        exit(json_encode(['code'=>0,'data'=>$valueData]));
    }


    public function autoSort(){
		$limt = isset($_REQUEST['limit'])?$_REQUEST['limit']:"5";
		$sort = 'clicktime';
        $whereConditions = [];
        foreach (array_slice($_REQUEST, 1) as $key => $value) {
            if ($key !== "page" && $key !== "limit"&& $key !== "order"&& $key !== "sort" && $key !== "t") {
                $whereConditions[] = "$key = '$value'";
            }
        }
        
        $where = implode(" AND ", $whereConditions);
        if ($where) {
		    $lists = "select * from `shangpinxinxi` where ".$where." order by ".$sort." desc limit 0,".$limt;
        }else{
		    $lists = "select * from `shangpinxinxi` order by ".$sort." desc limit 0,".$limt;
        }
		$result = table_sql($lists);
		$arrayData = array();
		if ($result->num_rows > 0) {
			while ($datas = $result->fetch_assoc()){
				array_push($arrayData,$datas);
			}
		}
		exit(json_encode([
			'code'=>0,
			'data' => [
				"total" => 0,
				"pageSize" => $limt,
				"totalPage" => 0,
				"currPage" => 0,
				"list" => $arrayData
			]
		]));
	}

    //查找相似用户
    public function cosine_similarity($a, $b) {
        $numerator = array_sum(array_map(function ($key) use ($a, $b) {
            return $a[$key] * $b[$key];
        }, array_intersect(array_keys($a), array_keys($b))));

        $denominator = sqrt(array_sum(array_map(function ($value) {
            return $value ** 2;
        }, $a))) * sqrt(array_sum(array_map(function ($value) {
            return $value ** 2;
        }, $b)));

        return $numerator / $denominator;
    }

    //用户订单协同算法
    public function autoSort2() {
        $limt = isset($_REQUEST['limit'])?$_REQUEST['limit']:"5";
		$token = $this->token();
        $tokens = json_decode(base64_decode($token),true);
        $orderSql = "select * from orders order by addtime desc";
        $orderInfo = table_sql($orderSql);
        $sorted_recommended_goods = [];
        $user_ratings = [];
        $data_dict = [];
        if ($orderInfo->num_rows > 0) {
            while ($orderRow = $orderInfo->fetch_assoc()){  
                $data_dict[] = $orderRow;
            }
        }
        //用户-订单矩阵
        foreach ($data_dict as $item) {
            $userId = $item['userid'];
            $goodId = $item['goodid'];
            if (array_key_exists($userId, $user_ratings)) {
                if (array_key_exists($goodId, $user_ratings[$userId])) {
                    $user_ratings[$userId][$goodId]++;
                } else {
                    $user_ratings[$userId][$goodId] = 1;
                }
            } else {
                $user_ratings[$userId] = [$goodId => 1];
            }
        }

        try {
            $targetUserId = $tokens['id'];
            $similarities = [];
            foreach ($user_ratings as $otherUserId => $ratings) {
                if ($otherUserId !== $targetUserId && $user_ratings[$targetUserId]!=null) {
                    $similarities[$otherUserId] = $this->cosine_similarity($user_ratings[$targetUserId], $ratings);
                }
            }
            arsort($similarities);
            $mostSimilarUser = key($similarities);
            if (!empty($user_ratings[$mostSimilarUser])) {
                //找到最相似但目标用户未购买过的商品;
                $recommended_goods = array_filter($user_ratings[$mostSimilarUser], function ($goodId) use ($user_ratings, $targetUserId) {
                    return !array_key_exists($goodId, $user_ratings[$targetUserId]);
                }, ARRAY_FILTER_USE_KEY);
                arsort($recommended_goods);
                //按评分降序排列推荐
                $sorted_recommended_goods = array_keys($recommended_goods);
            }
        } catch (\Exception $e) {
            // Handle exception
        }

        $whereConditions = [];
        foreach (array_slice($_REQUEST, 1) as $key => $value) {
            if ($key !== "page" && $key !== "limit"&& $key !== "order"&& $key !== "sort") {
                $whereConditions[] = "$key = '$value'";
            }
        }
        $where = implode(" AND ", $whereConditions);
        if ($where) {
            $sql = "SELECT * FROM (SELECT * FROM shangpinxinxi WHERE $where) AS table1 WHERE id IN ('" . implode("','", $sorted_recommended_goods) . "') UNION ALL SELECT * FROM (SELECT * FROM shangpinxinxi WHERE $where) AS table1 WHERE id NOT IN ('" . implode("','", $sorted_recommended_goods) . "')";
        } else {
            $sql = "SELECT * FROM shangpinxinxi WHERE id IN ('" . implode("','", $sorted_recommended_goods) . "') UNION ALL SELECT * FROM shangpinxinxi WHERE id NOT IN ('" . implode("','", $sorted_recommended_goods) . "')";
        }

		$result = table_sql($sql);
		$arrayData = array();
		if ($result->num_rows > 0) {
			while ($datas = $result->fetch_assoc()){
				array_push($arrayData,$datas);
			}
		}
		exit(json_encode([
			'code'=>0,
			'data' => [
				"total" => 0,
				"pageSize" => 5,
				"totalPage" => 0,
				"currPage" => 0,
				"list" => array_slice($arrayData, 0, $limt)
			]
		]));
    }

    /**
     * 获取需要提醒的记录数接口
     * get
     */
    public function remind($columnName,$type){
        $remindStart = isset($_GET['remindstart'])?$_GET['remindstart']:"";
        $remindEnd = isset($_GET['remindend'])?$_GET['remindend']:"";
        $token = $this->token();
        $tokens = json_decode(base64_decode($token),true);
        $where = " where 1 ";//查询条件
        if($tokens['isAdmin'] != 1 && $tokens['tablename'] == 'shangjia') {
            $where .= " and `shangjiazhanghao` = '".$tokens['username']."' ";
        }
        if ($type == 1){//数字
            if ($remindStart && $remindEnd){
                $where .= " and ".$columnName."<='".$remindEnd."' and ".$columnName.">='".$remindStart."'";
            }elseif($remindStart){
                $where .= " and ".$columnName.">='".$remindStart."'";
            }elseif($remindEnd){
                $where .= " and ".$columnName."<='".$remindEnd."'";
            }
        }else{
            if ($remindStart && $remindEnd){
                $where .= " and ".$columnName."<='".date("Y-m-d",strtotime("+".$remindEnd." day"))."' and ".$columnName.">='".date("Y-m-d",strtotime("+".$remindStart." day"))."'";
            }elseif($remindStart){
                $where .= " and ".$columnName.">='".date("Y-m-d",strtotime("+".$remindStart." day"))."'";
            }elseif($remindEnd){
                $where .= " and ".$columnName."<='".date("Y-m-d",strtotime("+".$remindEnd." day"))."'";
            }
            
        }
        $sql = "select * from `shangpinxinxi` ".$where;
        $result = table_sql($sql);
        exit(json_encode(['code'=> 0 ,'count' => $result->num_rows]));
    }







    public function group($columnName){
        $token = $this->token();
        $tokens = json_decode(base64_decode($token),true);
        $where = " where 1 ";
        if($tokens['isAdmin'] != 1 && $tokens['tablename'] == 'shangjia') {
            $where .= " and `shangjiazhanghao` = '".$tokens['username']."' ";
        }
        $sql = "SELECT ".$columnName.",count(".$columnName.") as total FROM shangpinxinxi ".$where." GROUP BY ".$columnName." ORDER BY $columnName asc";
        $result = table_sql($sql);
        if ($result->num_rows > 0) {
            // 输出数据
            $total = array();
            while($row = $result->fetch_assoc()) {
                array_push($total,array('total' => $row['total'],$columnName => $row[$columnName]));
            }
        }
        exit(json_encode(['code'=>0,'data'=>$total]));
    }
















}

