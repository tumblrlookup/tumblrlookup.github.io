<?php 		
	class Tumblr 
    {
		var $username;
        var $day;
        var $month;
        var $year;
        var $time;
        var $title;
        var $name;
        var $posts;
        var $description;
        var $likes;

		function __construct($e) 
        {		
			$this->username = $e;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, 'https://api.tumblr.com/v2/blog/'.$this->username.'/info?api_key=fuiKNFp9vQFvjLNvx4sUwti4Yb5yGutBN4Xh10LXZhhRKjWlV4');
            $result = curl_exec($ch);
            curl_close($ch);
            $obj = json_decode($result);
            $datum = $obj->response->blog->updated;
            $this->day = date("j", $datum);
            $this->month = date("F", $datum);
            $this->year = date("Y", $datum);
            $this->time = date("H:i:s", $datum);
            $this->title = $obj->response->blog->title;
            $this->name = $obj->response->blog->title;
            $this->posts = $obj->response->blog->total_posts;
            $this->description = $obj->response->blog->description;
        }
 
	
    }
    $tumblr = new Tumblr("whatonearthmademesaythat");
    
?>