<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 also a part of apis ok
 */

class MobileServices_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    /**
     * All Api functions
     */
    function mail_exists($key) {
        $this->db->where('email', $key);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function insert($table, $data_array) {
        $dbExi = $this->db->insert($table, $data_array);
        if ($dbExi) {
            return $this->db->insert_id();
        } else {
            return 0;
        }
    }

    public function checkLogin($email, $password) {
        // fetching user by email
        $user = $this->db
                ->select('id')
                ->where('email', $email)
                ->where('password', $password)
                ->limit(1)
                ->get('users')
                ->result_array();
lq();
        if (count($user) > 0) {
            return $user[0]['id'];
        } else {
            return false;
        }
    }

    public function getUserById($id) {
        $user = $this->db
                ->select('*')
                ->where('id', $id)
                ->limit(1)
                ->get('users')
                ->result_array();
        if (count($user) > 0) {
            return $user[0];
        } else {
            return null;
        }
    }
	 public function getUserByEmail($email) {
        $user = $this->db
                ->select('*')
                ->where('email', $email)
                ->limit(1)
                ->get('users')
                ->result_array();
        if (count($user) > 0) {
            return $user[0];
        } else {
            return null;
        }
    }
	
	public function getUserObject($id) {
        $user = $this->db
                ->select('id as user_id,username,name,email,phone,address,image,referal_code,timezone')
                ->where('id', $id)
                ->limit(1)
                ->get('users')
                ->result_array();
        if (count($user) > 0) {
            return $user[0];
        } else {
            return null;
        }
    }


    public function updateDevice($user_id, $device_type, $device_id) {
        $data = array(
            'id' => $user_id,
            'devicetype' => $device_type,
            'device_id' => $device_id);
        $this->db->where('id', $user_id);
        $dbExi = $this->db->update('users', $data);
    }

    //predefined sentences
    public function getPredefined() {
        return $this->db
                        ->select('*')
                        ->get('predifned_answers')
                        ->result_array();
    }

    //All Topics
    public function getTopics() {
        $topics = $this->db
                ->select('*')
                ->get('topics')
                ->result_array();
        $count = 0;
        foreach ($topics as $topic) {
            $topics[$count]['rating'] = $this->calculateTopicRating($topic['id']);
            $count = $count + 1;
        }
        return $topics;
    }

    function calculateTopicRating($topic_id) {
        $ratings = array(
            5 => $this->ratingCount($topic_id, 5),
            4 => $this->ratingCount($topic_id, 4),
            3 => $this->ratingCount($topic_id, 3),
            2 => $this->ratingCount($topic_id, 2),
            1 => $this->ratingCount($topic_id, 1)
        );

        return $this->calcAverageRating($ratings);
    }

    function ratingCount($topic_id, $rating) {
        return count($this->db
                        ->select('*')
                        ->where('topic_id', $topic_id)
                        ->where('rating', $rating)
                        ->get('rating')
                        ->result_array());
    }

    function calcAverageRating($ratings) {

        $totalWeight = 0;
        $totalReviews = 0;

        foreach ($ratings as $weight => $numberofReviews) {

            $WeightMultipliedByNumber = $weight * $numberofReviews;
            $totalWeight += $WeightMultipliedByNumber;
            $totalReviews += $numberofReviews;
        }

        //divide the total weight by total number of reviews
        if ($totalReviews == 0) {
            return 0;
        }
        $averageRating = $totalWeight / $totalReviews;

        return number_format((float) $averageRating, 2, '.', '');
    }

    //Get Rating if already saved
    public function ratingStatus($data) {
        // fetching user by email
        $result = $this->db
                ->select('id')
                ->where('user_id', $data["user_id"])
                ->where('topic_id', $data["topic_id"])
                ->limit(1)
                ->get('rating')
                ->result_array();

        if (count($result) > 0) {
            $data["id"] = $result[0]["id"];
            return $this->db->update('rating', $data);
        } else {
            return $this->insert("rating", $data);
        }
    }

    //Get Anser if already saved
    //Get Anser if already saved
    public function answerStatus($data) {

        $result = $this->db
                ->select('*')
                ->where('user_id', $data["user_id"])
                ->where('topic_id', $data["topic_id"])
                ->limit(1)
                ->get('answers')
                ->result_array();

        if (count($result) > 0) {
            return $result;
        } else {
            return array();
        }
    }

    public function addAnswer($data) {

        $result = $this->db
                ->select('id')
                ->where('user_id', $data["user_id"])
                ->where('topic_id', $data["topic_id"])
                ->limit(1)
                ->get('answers')
                ->result_array();

        if (count($result) > 0) {
            $this->db->where("id", $result[0]["id"]);
            return $this->db->update('answers', $data);
        } else {
            return $this->insert("answers", $data);
        }
    }

    //Get Rating if already saved
    public function likesdislikesStatus($data) {
        // fetching user by email
        $result = $this->db
                ->select('id')
                ->where('user_id', $data["user_id"])
                ->where('answer_id', $data["answer_id"])
                ->limit(1)
                ->get('likesdislikes')
                ->result_array();
        if (count($result) > 0) {
            $this->db->where("id", $result[0]["id"]);
            return $this->db->update('likesdislikes', $data);
        } else {
            return $this->insert("likesdislikes", $data);
        }
    }

    public function topicAnswersOrUserAnswers($data) {
        if (isset($data["user_id"])) {
            return $this->db
                            ->select('answers.*,topics.title as topic,topics.image')
                            ->from('answers')
                            ->join('topics', 'topics.id = answers.topic_id')
                            ->where('answers.user_id', $data["user_id"])->get()
                            ->result_array();
        } else {
            return $this->db
                            ->select('answers.*,users.name,users.image')
                            ->from('answers')
                            ->join('users', 'users.id = answers.user_id')
                            ->where('answers.topic_id', $data["topic_id"])
                            ->get()
                            ->result_array();
        }
    }

    public function getUsersStatsByUserId($user_id) {
        $data = array();
        $data["total_answers"] = $this->totalUserAnswers($user_id);
        $data["total_like"] = $this->totalUserAnswersLikes($user_id);
        $data["total_unlikes"] = $this->totalUserAnswersUnLikes($user_id);
        $data["progress"] = $this->userAnswersProgress($user_id);
        $data["progress_info"] = "Progress is calculated on the basis of like/unlikes by users on your answers";
        return $data;
    }

    function totalUserAnswers($user_id) {
        return count($this->db
                        ->select('*')
                        ->from('answers')
                        ->where('user_id', $user_id)
                        ->get()
                        ->result_array());
    }

    function totalUserAnswersLikes($user_id) {
        return count($this->db
                        ->select('*')
                        ->where('user_id', $user_id)
                        ->where('islike', 1)
                        ->get('likesdislikes')
                        ->result_array());
    }

    function totalUserAnswersUnLikes($user_id) {
        return count($this->db
                        ->select('*')
                        ->where('user_id', $user_id)
                        ->where('islike', 0)
                        ->get('likesdislikes')
                        ->result_array());
    }

    function userAnswersProgress($user_id) {
        $totalLikes = $this->totalUserAnswersLikes($user_id);
        $totalUnLikes = $this->totalUserAnswersUnLikes($user_id);
        $totalLikesUnlikes = $totalLikes + $totalUnLikes;
        if ($totalLikesUnlikes == 0) {
            return 0;
        }
        return number_format((float) (($totalLikes / $totalLikesUnlikes) * 100), 2, '.', '');
    }

    public function totalLikesOrUnlikes($answer_id, $islike) {
        return count($this->db
                        ->select('*')
                        ->where('answer_id', $answer_id)
                        ->where('islike', $islike)
                        ->get('likesdislikes')
                        ->result_array());
    }

    //All categories
    public function getCategories() {
        $categories = $this->db
                ->select('*')
                ->where('status', 1)
                ->get('categories')
                ->result_array();
        $count = 0;
        foreach ($categories as $category) {
            $categories[$count]['products'] = $this->getProducts($category['id']);
            $count = $count + 1;
        }
        return $categories;
    }

    //get products of category
    public function getProducts($cat_id) {
        $categories = $this->db
                ->select('*')
                ->where('cat_id', $cat_id)
                ->get('product')
                ->result_array();

        $count = 0;
        foreach ($categories as $category) {
            $categories[$count]['attachments'] = $this->getImagesByProductId($category['id']);
            $count = $count + 1;
        }
        return $categories;
    }

    public function getImagesByProductId($product_id) {
        return $this->db
                        ->select('*')
                        ->where('product_id', $product_id)
                        ->get('product_images')
                        ->result_array();
    }
    public function get_where($array,$table) {
        return $this->db
                        ->select('*')
                        ->where($array)
                        ->get($table)
                        ->result_array();
    }

}
