<?php
session_start();

if(isset($_SESSION['student_id']) || isset($_SESSION['teacher_id']) || isset($_SESSION['admin_id']))
{

$name=$_SESSION['name'];
include('config.php');

if($_POST['news_id']){
$tbl_name="general_news";
    $id=$_POST['news_id'];
    $sql="DELETE FROM $tbl_name WHERE news_id='$id'";
    $result=mysql_query($sql) or die("oopsy, error when tryin to delete events 2");
if($result){
header("location:addnews.php");
}
else {
echo "ERROR";
}
}
else if($_POST['resource_id']){
$tbl_name1="resources";
$rid=$_POST['resource_id'];
    $sql1="DELETE FROM $tbl_name1 WHERE resource_id='$rid'";
    $result1=mysql_query($sql1) or die("oopsy, error when tryin to delete events 2");
if($result1){
header("location:addresources.php");
}
else {
echo "ERROR";
}
}

else if($_POST['article_id']){
$tbl_name="blog_articles";
$tbl_name1="blog_comments";
$id=$_POST['article_id'];
$page=$_POST['page'];
    $sql="DELETE FROM $tbl_name WHERE article_id='$id'";
    $result=mysql_query($sql) or die("oopsy, error when tryin to delete events 2");
 $sql1="DELETE FROM $tbl_name1 WHERE article_id='$id'";
    $result1=mysql_query($sql1) or die("oopsy, error when tryin to delete events 2");
if($result){
header("location:blog.php?page=$page");
}
else {
echo "ERROR";
}
}

else if($_POST['comment_id'] && $_POST['article']){
$tbl_name="blog_comments";
$article_id=$_POST['article'];
$comment_id=$_POST['comment_id'];
$hash=$_POST['hash'];
    $sql="DELETE FROM $tbl_name WHERE article_id='$article_id' AND comment_id='$comment_id'";
    $result=mysql_query($sql) or die("oopsy, error when tryin to delete events 2");
$tbl_name2="blog_articles";
$sql3="UPDATE $tbl_name2 SET comments=comments-1 WHERE article_id='$article_id'";
$result3=mysql_query($sql3);
if($result){
header("location:view_article.php?article_id=$article_id&hash=$hash");
}
else {
echo "ERROR";
}
}

else if($_POST['topic_id']){
$tbl_name="forum_topics";
$tbl_name1="forum_replies";
$id=$_POST['topic_id'];
$category_id=$_POST['category_id'];
$category_name=$_POST['category_name'];
$hash=$_POST['hash'];
    $sql="DELETE FROM $tbl_name WHERE topic_id='$id'";
    $result=mysql_query($sql) or die("oopsy, error when tryin to delete events 2");
 $sql1="DELETE FROM $tbl_name1 WHERE topic_id='$id'";
    $result1=mysql_query($sql1) or die("oopsy, error when tryin to delete events 2");
$tbl_name2="categories";
$sql3="UPDATE $tbl_name2 SET no_of_topics=no_of_topics-1 WHERE category_id='$category_id'";
$result3=mysql_query($sql3);
if($result){
header("location:view_category.php?category_id=$category_id&hash=$hash&category_name=$category_name");
}
else {
echo "ERROR";
}
}

else if($_POST['reply_id'] && $_POST['topic']){
$tbl_name="forum_replies";
$topic_id=$_POST['topic'];
$reply_id=$_POST['reply_id'];
$category_id=$_POST['category_id'];
$category_name=$_POST['category_name'];
$hash=$_POST['hash'];
    $sql="DELETE FROM $tbl_name WHERE topic_id='$topic_id' AND reply_id='$reply_id'";
    $result=mysql_query($sql) or die("oopsy, error when tryin to delete events 2");
$tbl_name2="forum_topics";
$sql3="UPDATE $tbl_name2 SET reply=reply-1 WHERE topic_id='$topic_id'";
$result3=mysql_query($sql3);
if($result){
header("location:view_topic.php?category_id=$category_id&hash=$hash&category_name=$category_name&topic_id=$topic_id");
}
else {
echo "ERROR";
}
}

else if($_POST['event_id']){
$tbl_name="events";
$tbl_name1="event_comments";
$id=$_POST['event_id'];
    $sql="DELETE FROM $tbl_name WHERE event_id='$id'";
    $result=mysql_query($sql) or die("oopsy, error when tryin to delete events 2");
 $sql1="DELETE FROM $tbl_name1 WHERE event_id='$id'";
    $result1=mysql_query($sql1) or die("oopsy, error when tryin to delete events 2");
if($result){
header("location:loginevents.php?page=1");
}
else {
echo "ERROR";
}
}

else if($_POST['ecomment_id'] && $_POST['event']){
$tbl_name="event_comments";
$hash=$_POST['hash'];
$event_id=$_POST['event'];
$comment_id=$_POST['ecomment_id'];
    $sql="DELETE FROM $tbl_name WHERE event_id='$event_id' AND event_comment_id='$comment_id'";
    $result=mysql_query($sql) or die("oopsy, error when tryin to delete events 2");
if($result){
echo $hash;
header("location:view_event.php?event_id=$event_id&hash=$hash");
}
else {
echo "ERROR";
}
}

else if($_POST['course_id']){
$tbl_name="courses";
$tbl_name1="course_assignments";
$tbl_name2="submission";
$id=$_POST['course_id'];
    $sql="DELETE FROM $tbl_name WHERE course_id='$id'";
    $result=mysql_query($sql) or die("oopsy, error when tryin to delete events 2");
 $sql1="DELETE FROM $tbl_name1 WHERE course_id='$id'";
    $result1=mysql_query($sql1) or die("oopsy, error when tryin to delete events 2");
$sql2="DELETE FROM $tbl_name2 WHERE course_id='$id'";
    $result2=mysql_query($sql2) or die("oopsy, error when tryin to delete events 2");

if($result){
header("location:courses.php");
}
else {
echo "ERROR";
}
}

else if($_POST['assignment_id'] && $_POST['course']){
$tbl_name="course_assignments";
$tbl_name1="submission";
$id=$_POST['course'];
$hash=$_POST['hash'];
$assignment_id=$_POST['assignment_id'];
    $sql="DELETE FROM $tbl_name WHERE course_id='$id' AND assignment_id='$assignment_id'";
    $result=mysql_query($sql) or die("oopsy, error when tryin to delete events 2");
$sql1="DELETE FROM $tbl_name1 WHERE course_id='$id' AND assignment_id='$assignment_id'";
    $result1=mysql_query($sql1) or die("oopsy, error when tryin to delete events 2");

if($result){
header("location:view_course.php?course_id=$id&hash=$hash");
}
else {
echo "ERROR";
}
}

mysql_close();
}
else
{
header("location:index.php");
}
?>