<?php
if (isset($_POST['fb_url'])) {
    $url = $_POST['fb_url'];
    
    // Check if URL is valid
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        die("Invalid URL!");
    }

    // Extract video ID (simplified method)
    $video_id = '';
    if (preg_match('/videos\/(\d+)/', $url, $matches)) {
        $video_id = $matches[1];
    } elseif (preg_match('/video\.php\?v=(\d+)/', $url, $matches)) {
        $video_id = $matches[1];
    } else {
        die("Could not extract Video ID. Try a direct video link.");
    }

    // Facebook's direct video URL (works for some public videos)
    $direct_url = "https://www.facebook.com/video/play/?video_id={$video_id}";
    $download_url = "https://www.facebook.com/video.php?v={$video_id}";

    // Display download link
    echo "<h2>Download Ready!</h2>";
    echo "<a href='{$download_url}' download>Click here to download</a>";
    echo "<br><br>If the download doesn't start, right-click the link and select 'Save Link As'.";
}
?>