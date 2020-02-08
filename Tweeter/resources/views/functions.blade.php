@php
    function hasLiked($tweetId, $userId){
        // use \App\Likes;
        $like = \App\Likes::where('user_id', $userId)->where('tweet_id', $tweetId)->get();
        //var_dump($like);
        if(sizeOf($like) > 0){
            return true;
        }
        return false;
    }
    function checkFollowing($userToCheck, $follows){
        foreach($follows as $follow){
            if($follow->followed_id == $userToCheck){
                return true;
            }
        }
        return false;
    }
    function isUser($userToCheck, $authUser){
        if($userToCheck == $authUser){
            return true;
        }
        return false;
    }
    function getUserName($tweetUserID){
        $username = App\User::where('id', $tweetUserID)->get('name');

        return $username[0]->name;
    }
    function getLikes($tweetId){
        $likes = sizeOf(App\Likes::where('tweet_id', $tweetId)->get());

        return $likes;
    }
@endphp
