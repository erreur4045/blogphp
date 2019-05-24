<?php
require_once ('models/PostManager.php');
require_once ('models/Comment.php');
require_once ('models/Post.php');
require_once ('models/CommentManager.php');
function testfunction()
{
    //pour la classe post

}
function bio()
{
    require('view/BioView.php');
}

function accueil()
{
    require('view/AccueilView.php');
}

function mention()
{
    require('view/MentionsView.php');
}

function CV()
{
    require('view/CvView.php');
}

function contact()
{
    require('view/ContactView.php');
}
