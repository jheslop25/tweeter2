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
@endphp
