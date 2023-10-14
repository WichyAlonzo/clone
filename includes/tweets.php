<?php
$user_id = $_SESSION['user_id'];
// global $tweets;
foreach ($tweets as $tweet) {

  $retweet_sign = false;
  $retweet_comment = false;
  $qoq = false;

  if (Tweet::isTweet($tweet->id)) {

    $tweet_user = User::getData($tweet->user_id);
    $tweet_real = Tweet::getTweet($tweet->id);
    $timeAgo = Tweet::getTimeAgo($tweet->post_on);
    $likes_count = Tweet::countLikes($tweet->id);
    $user_like_it = Tweet::userLikeIt($user_id, $tweet->id);
    $retweets_count = Tweet::countRetweets($tweet->id);
    $user_retweeted_it = Tweet::userRetweeetedIt($user_id, $tweet->id);
  } else if (Tweet::isRetweet($tweet->id)) {

    $retweet = Tweet::getRetweet($tweet->id);

    if ($retweet->retweet_msg == null) {

      if ($retweet->retweet_id == null) {

        // if retweeted normal tweet
        $retweeted_tweet = Tweet::getTweet($retweet->tweet_id);
        $tweet_user = User::getData($retweeted_tweet->user_id);
        $tweet_real = Tweet::getTweet($retweet->tweet_id);
        $timeAgo = Tweet::getTimeAgo($tweet_real->post_on);
        $likes_count = Tweet::countLikes($retweet->tweet_id);
        $user_like_it = Tweet::userLikeIt($user_id, $retweet->tweet_id);
        $retweets_count = Tweet::countRetweets($retweet->tweet_id);
        $user_retweeted_it = Tweet::userRetweeetedIt($user_id, $retweet->tweet_id);
        $retweeted_user = User::getData($tweet->user_id);
        $retweet_sign = true;
      } else {

        // this condtion if user retweeted quoted tweet or quote of quote tweet


        $retweeted_tweet = Tweet::getRetweet($retweet->retweet_id);

        if ($retweeted_tweet->tweet_id != null) {
          // here it's retweeted quoted
          // if($retweeted_tweet->) 
          $tweet_user = User::getData($retweeted_tweet->user_id);
          $timeAgo = Tweet::getTimeAgo($retweeted_tweet->post_on);
          $likes_count = Tweet::countLikes($retweeted_tweet->post_id);
          $user_like_it = Tweet::userLikeIt($user_id, $retweeted_tweet->post_id);
          $retweets_count = Tweet::countRetweets($retweeted_tweet->post_id);
          $user_retweeted_it = Tweet::userRetweeetedIt($user_id, $retweeted_tweet->post_id);


          $tweet_inner = Tweet::getTweet($retweeted_tweet->tweet_id);
          $user_inner_tweet = User::getData($tweet_inner->user_id);
          $timeAgo_inner = Tweet::getTimeAgo($tweet_inner->post_on);
          $retweeted_user = User::getData($tweet->user_id);
          $retweet_sign = true;

          $qoute = $retweeted_tweet->retweet_msg;
          $retweet_comment = true;
        } else {
          // here is retweeted quoted of quoted

          $retweet_sign = true;
          $tweet_user = User::getData($retweeted_tweet->user_id);

          $timeAgo = Tweet::getTimeAgo($retweeted_tweet->post_on);
          $likes_count = Tweet::countLikes($retweeted_tweet->post_id);
          $user_like_it = Tweet::userLikeIt($user_id, $retweeted_tweet->post_id);
          $retweets_count = Tweet::countRetweets($retweeted_tweet->post_id);
          $user_retweeted_it = Tweet::userRetweeetedIt($user_id, $retweeted_tweet->post_id);

          $qoq = true; // stand for quote of quote
          $qoute = $retweeted_tweet->retweet_msg;
          $tweet_inner = Tweet::getRetweet($retweeted_tweet->retweet_id);
          $user_inner_tweet = User::getData($tweet_inner->user_id);
          $timeAgo_inner = Tweet::getTimeAgo($tweet_inner->post_on);
          $inner_qoute  = $tweet_inner->retweet_msg;



          $retweeted_user = User::getData($tweet->user_id);
        }
      }
    } else {
      // quote tweet condtion
      if ($retweet->retweet_id == null) {
        $tweet_user = User::getData($tweet->user_id);
        $timeAgo = Tweet::getTimeAgo($tweet->post_on);
        $likes_count = Tweet::countLikes($tweet->id);
        $user_like_it = Tweet::userLikeIt($user_id, $tweet->id);
        $retweets_count = Tweet::countRetweets($tweet->id);
        $user_retweeted_it = Tweet::userRetweeetedIt($user_id, $tweet->id);
        $qoute = $retweet->retweet_msg;
        $retweet_comment = true;


        $tweet_inner = Tweet::getTweet($retweet->tweet_id);
        $user_inner_tweet = User::getData($tweet_inner->user_id);
        $timeAgo_inner = Tweet::getTimeAgo($tweet_inner->post_on);
      } else {

        // this condtion for quote of quote which retweet_id not null and retweet msg not null
        $tweet_user = User::getData($tweet->user_id);
        $timeAgo = Tweet::getTimeAgo($tweet->post_on);
        $likes_count = Tweet::countLikes($tweet->id);
        $user_like_it = Tweet::userLikeIt($user_id, $tweet->id);
        $retweets_count = Tweet::countRetweets($tweet->id);
        $user_retweeted_it = Tweet::userRetweeetedIt($user_id, $tweet->id);
        $qoute = $retweet->retweet_msg;
        $qoq = true; // stand for quote of quote

        $tweet_inner = Tweet::getRetweet($retweet->retweet_id);
        $user_inner_tweet = User::getData($tweet_inner->user_id);
        $timeAgo_inner = Tweet::getTimeAgo($tweet_inner->post_on);
        $inner_qoute = $tweet_inner->retweet_msg;
        if ($inner_qoute == null) {

          $tweet_innerr = Tweet::getRetweet($tweet_inner->retweet_id);
          $inner_qoute = $tweet_innerr->retweet_msg;

          // $inner_quote = "qork";

        }
      }
    }
  }
  $tweet_link = $tweet->id;

  if ($retweet_sign)
    $comment_count = Tweet::countComments($retweeted_tweet->id);
  else  $comment_count = Tweet::countComments($tweet->id);

?>

  <div class="box-tweet feed" style="position: relative;">
    <a href="status/<?php echo $tweet_link; ?>">
      <span style="position:absolute; width:100%; height:100%; top:0;left: 0; z-index: 1;"></span>
    </a>
    <?php if ($retweet_sign) { ?>
      <span class="retweed-name"> 
      <svg class="fas fa-retweetx" xmlns="http://www.w3.org/2000/svg" height="1.2em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path d="M272 416c17.7 0 32-14.3 32-32s-14.3-32-32-32H160c-17.7 0-32-14.3-32-32V192h32c12.9 0 24.6-7.8 29.6-19.8s2.2-25.7-6.9-34.9l-64-64c-12.5-12.5-32.8-12.5-45.3 0l-64 64c-9.2 9.2-11.9 22.9-6.9 34.9s16.6 19.8 29.6 19.8l32 0 0 128c0 53 43 96 96 96H272zM304 96c-17.7 0-32 14.3-32 32s14.3 32 32 32l112 0c17.7 0 32 14.3 32 32l0 128H416c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l64 64c12.5 12.5 32.8 12.5 45.3 0l64-64c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8l-32 0V192c0-53-43-96-96-96L304 96z" />
              </svg>
        <a style="position: relative; z-index:100; color:rgb(102, 117, 130);" href="<?php echo $retweeted_user->username; ?> "> <?php if ($retweeted_user->id == $user_id) echo " Tú";
                                                                                                                                else echo $retweeted_user->name; ?> </a> compartió</span>
    <?php } ?>
    <div class="grid-tweet pt-4 pb-2">
      <a style="position: relative; z-index:1000" href="profile?username=<?php echo $tweet_user->username;  ?>">
        <img src="assets/images/users/<?php echo $tweet_user->img; ?>" alt="" class="img-user-tweet" />
      </a>

      <div>
        <p>
          <a style="position: relative; z-index:1000; color:black" href="profile?username=<?php echo $tweet_user->username;  ?>">
            <strong> <?php echo $tweet_user->name ?> </strong>
          </a>
          <span class="username-twitter">@<?php echo $tweet_user->username ?> </span>
          <span class="username-twitter"><?php echo $timeAgo ?></span>
        </p>
        <p class="tweet-links">
          <?php
          // check if it's quote or normal tweet
          if ($retweet_comment || $qoq)
            echo  Tweet::getTweetLinks($qoute);
          else echo  Tweet::getTweetLinks($tweet_real->status); ?>
        </p>
        <?php if ($retweet_comment == false && $qoq == false) { ?>
          <?php if ($tweet_real->img != null) { ?>
            <p class="mt-post-tweet">
              <img src="assets/images/tweets/<?php echo $tweet_real->img; ?>" alt="" class="img-post-tweet" />
            </p>
          <?php }
        } else { ?>
          <!-- qoued tweet place here -->

          <div class="mt-post-tweet comment-post" style="position: relative;">

            <a href="status/<?php echo $tweet_inner->id; ?>">
              <span class="" style="position:absolute; width:100%; height:100%; top:0;left: 0; z-index: 2;"></span>
            </a>
            <div class="grid-tweet pt-4 pb-2">

              <a style="position: relative; z-index:1000" href="<?php echo $user_inner_tweet->username;  ?>">
                <img src="assets/images/users/<?php echo $user_inner_tweet->img; ?>" alt="" class="img-user-tweet" />
              </a>

              <div>
                <p>
                  <a style="position: relative; z-index:1000; color:black" href="<?php echo $user_inner_tweet->username;  ?>">
                    <strong> <?php echo $user_inner_tweet->name ?> </strong>
                  </a>
                  <span class="username-twitter">@<?php echo $user_inner_tweet->username ?> </span>
                  <span class="username-twitter"><?php echo $timeAgo_inner ?></span>
                </p>
                <p>
                  <?php
                  if ($qoq)
                    echo Tweet::getTweetLinks($inner_qoute);
                  else  echo  Tweet::getTweetLinks($tweet_inner->status); ?>
                </p>
                <?php   // don't show img if quote of quote
                if ($qoq == false) {
                  if ($tweet_inner->img != null) { ?>
                    <p class="mt-post-tweet">
                      <img src="assets/images/tweets/<?php echo $tweet_inner->img; ?>" alt="" class="img-post-tweet" />
                    </p>
                <?php }
                } ?>

              </div>

            </div>


          </div>

        <?php } ?>

        <div class="grid-reactions">
          <div class="grid-box-reaction">
            <div class="hover-reaction hover-reaction-comment comment" data-user="<?php echo $user_id; ?>" data-tweet="<?php
                                                                                                                        if ($retweet_sign)
                                                                                                                          echo $retweeted_tweet->id;
                                                                                                                        else  echo $tweet->id; ?>">

              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path d="M123.6 391.3c12.9-9.4 29.6-11.8 44.6-6.4c26.5 9.6 56.2 15.1 87.8 15.1c124.7 0 208-80.5 208-160s-83.3-160-208-160S48 160.5 48 240c0 32 12.4 62.8 35.7 89.2c8.6 9.7 12.8 22.5 11.8 35.5c-1.4 18.1-5.7 34.7-11.3 49.4c17-7.9 31.1-16.7 39.4-22.7zM21.2 431.9c1.8-2.7 3.5-5.4 5.1-8.1c10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240C0 125.1 114.6 32 256 32s256 93.1 256 208s-114.6 208-256 208c-37.1 0-72.3-6.4-104.1-17.9c-11.9 8.7-31.3 20.6-54.3 30.6c-15.1 6.6-32.3 12.6-50.1 16.1c-.8 .2-1.6 .3-2.4 .5c-4.4 .8-8.7 1.5-13.2 1.9c-.2 0-.5 .1-.7 .1c-5.1 .5-10.2 .8-15.3 .8c-6.5 0-12.3-3.9-14.8-9.9c-2.5-6-1.1-12.8 3.4-17.4c4.1-4.2 7.8-8.7 11.3-13.5c1.7-2.3 3.3-4.6 4.8-6.9c.1-.2 .2-.3 .3-.5z" />
              </svg>
              <div class="mt-counter likes-count d-inline-block">
                <p class="fw-bolder"> <?php if ($comment_count > 0) echo $comment_count; ?> </p>
              </div>
            </div>
          </div>
          <div class="grid-box-reaction">

            <div class="hover-reaction hover-reaction-retweet
        <?= $user_retweeted_it ? 'retweeted' : 'retweet' ?> option" data-tweet="<?php
                                                                                // send the tweet you wanna undo retweet to undo function
                                                                                // if the user retweeted it and it's the real tweet
                                                                                // to send the id of retweeted tweet
                                                                                // if($user_retweeted_it && !$retweet_sign)
                                                                                // echo Tweet::retweetRealId($tweet->id);
                                                                                // else
                                                                                echo $tweet->id;
                                                                                ?>" data-user="<?php echo $user_id; ?>
        " data-retweeted="<?php echo $user_retweeted_it; ?>" data-sign="<?php echo $retweet_sign; ?>" data-tmp="<?php echo $retweet_comment; ?>" data-qoq="<?php echo $qoq; ?>">



              <!-- <i class="fas fa-retweet"></i> -->
              <svg class="fas fa-retweetx" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path d="M272 416c17.7 0 32-14.3 32-32s-14.3-32-32-32H160c-17.7 0-32-14.3-32-32V192h32c12.9 0 24.6-7.8 29.6-19.8s2.2-25.7-6.9-34.9l-64-64c-12.5-12.5-32.8-12.5-45.3 0l-64 64c-9.2 9.2-11.9 22.9-6.9 34.9s16.6 19.8 29.6 19.8l32 0 0 128c0 53 43 96 96 96H272zM304 96c-17.7 0-32 14.3-32 32s14.3 32 32 32l112 0c17.7 0 32 14.3 32 32l0 128H416c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l64 64c12.5 12.5 32.8 12.5 45.3 0l64-64c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8l-32 0V192c0-53-43-96-96-96L304 96z" />
              </svg>
              <div class="mt-counter likes-count d-inline-block">
                <p class="fw-bolder"><?php if ($retweets_count > 0)  echo $retweets_count; ?></p>
              </div>



            </div>

            <div class="options">


            </div>

          </div>
          <div class="grid-box-reaction">
            <a class="hover-reaction hover-reaction-like 
        <?= $user_like_it ? 'unlike-btn' : 'like-btn' ?> " data-tweet="<?php
                                                                        if ($retweet_sign) {
                                                                          if ($retweet->tweet_id != null) {
                                                                            echo $retweet->tweet_id;
                                                                          }
                                                                          echo $retweet->retweet_id;
                                                                        } else echo $tweet->id;
                                                                        //  echo Tweet::likedTweetRealId($tweet->id);

                                                                        ?>" data-user="<?php echo $user_id; ?>">


              <i class="fa-heart <?= $user_like_it ? 'fas' : 'far mt-icon-reaction' ?>"></i>
              <!-- <i class="fas fa-heart liked"></i> -->

              <div class="mt-counter likes-count d-inline-block">
                <p class="fw-bolder"> <?php if ($likes_count > 0)  echo $likes_count; ?> </p>
              </div>
            </a>


          </div>

          <div class="grid-box-reaction">
            <!-- <div class="hover-reaction hover-reaction-comment">

              <i class="fas fa-ellipsis-h mt-icon-reaction"></i>
            </div> -->
            <div class="mt-counter">
              <p></p>
            </div>
          </div>
        </div>
      </div>
    </div>




  </div>


  <div class="popupTweet">

  </div>
  <div class="popupComment">

  </div>




<?php } ?>