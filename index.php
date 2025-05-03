<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Free Facebook Video Downloader - Download HD videos from Facebook in MP4 format. Fast, secure, and no registration required.">
    <meta name="keywords" content="facebook video downloader, download facebook videos, fb video downloader, save facebook videos, facebook to mp4">
    <meta name="author" content="Facebook Video Downloader">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://yourwebsite.com/" />
    
    <!-- Open Graph / Social Media Meta Tags -->
    <meta property="og:title" content="Facebook Video Downloader - Save Videos in HD">
    <meta property="og:description" content="Download Facebook videos in MP4 format for free. No registration needed.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://yourwebsite.com/">
    <meta property="og:image" content="https://yourwebsite.com/cover.jpg">
    
    <!-- Favicon -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    
    <title>Facebook Video Downloader | Download HD Videos for Free</title>
    
    <style>
        :root {
            --primary-color: #1877f2; /* Facebook blue */
            --secondary-color: #42b72a;
            --text-color: #333;
            --light-gray: #f0f2f5;
            --dark-gray: #65676b;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--light-gray);
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }
        
        header {
            text-align: center;
            padding: 30px 0;
        }
        
        header h1 {
            color: var(--primary-color);
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        
        header p {
            color: var(--dark-gray);
            font-size: 1.1rem;
        }
        
        .download-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        
        .input-group {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        input[type="url"] {
            padding: 15px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            width: 100%;
        }
        
        button {
            padding: 15px 30px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        button:hover {
            background: #166fe5;
            transform: translateY(-2px);
        }
        
        #result {
            margin-top: 20px;
            padding: 20px;
            border-radius: 8px;
            display: none;
        }
        
        .success {
            background: #e7f3ff;
            border-left: 5px solid var(--primary-color);
        }
        
        .error {
            background: #ffebee;
            border-left: 5px solid #f44336;
        }
        
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin: 40px 0;
        }
        
        .feature-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        
        .feature-card h3 {
            color: var(--primary-color);
            margin-bottom: 10px;
        }
        
        footer {
            background: white;
            padding: 30px;
            text-align: center;
            margin-top: 50px;
            border-top: 1px solid #eee;
        }
        
        .footer-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .footer-links a {
            color: var(--dark-gray);
            text-decoration: none;
        }
        
        .footer-links a:hover {
            color: var(--primary-color);
        }
        
        @media (max-width: 768px) {
            header h1 {
                font-size: 2rem;
            }
            
            .features {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Facebook Video Downloader</h1>
            <p>Download HD videos from Facebook in MP4 format - Fast, Free & Secure</p>
        </header>
        
        <div class="download-box">
            <form method="POST">
                <div class="input-group">
                    <input type="url" name="fb_url" placeholder="Paste Facebook video URL here..." required>
                    <button type="submit">Download Now</button>
                </div>
            </form>
            
            <div id="result">
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fb_url'])) {
                    $url = $_POST['fb_url'];
                    
                    if (!filter_var($url, FILTER_VALIDATE_URL)) {
                        echo '<div class="error">Please enter a valid URL</div>';
                    } else {
                        $video_id = '';
                        
                        // Extract video ID from different URL formats
                        if (preg_match('/videos\/(\d+)/', $url, $matches)) {
                            $video_id = $matches[1];
                        } elseif (preg_match('/video\.php\?v=(\d+)/', $url, $matches)) {
                            $video_id = $matches[1];
                        } elseif (preg_match('/reel\/(\d+)/', $url, $matches)) {
                            $video_id = $matches[1];
                        } else {
                            echo '<div class="error">Could not extract Video ID. Please try a direct video link.</div>';
                            exit;
                        }
                        
                        $download_url = "https://www.facebook.com/video.php?v={$video_id}";
                        
                        echo '<div class="success">';
                        echo '<h3>Your Download is Ready!</h3>';
                        echo "<p><a href='{$download_url}' download style='color:var(--primary-color);font-weight:bold;'>Click Here to Download</a></p>";
                        echo "<p>If download doesn't start, <strong>right-click</strong> the link and select <strong>Save Link As</strong>.</p>";
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
        
        <section class="features">
            <div class="feature-card">
                <h3>Fast Downloads</h3>
                <p>Download Facebook videos in seconds without any waiting time or registration.</p>
            </div>
            <div class="feature-card">
                <h3>HD Quality</h3>
                <p>Get videos in high quality (720p, 1080p) without losing resolution.</p>
            </div>
            <div class="feature-card">
                <h3>No Watermark</h3>
                <p>Download clean videos without any annoying watermarks or ads.</p>
            </div>
        </section>
        
        <section class="content">
            <h2>How to Download Facebook Videos?</h2>
            <ol>
                <li>Copy the URL of the Facebook video you want to download</li>
                <li>Paste the link in the input box above</li>
                <li>Click "Download Now" button</li>
                <li>Save the video to your device</li>
            </ol>
            
            <h2>Why Use Our Facebook Video Downloader?</h2>
            <p>Our tool is the fastest way to download videos from Facebook. Unlike other services:</p>
            <ul>
                <li>No registration required</li>
                <li>No software installation needed</li>
                <li>Works on all devices (PC, Android, iPhone)</li>
                <li>Completely free with no hidden charges</li>
            </ul>
            
            <h2>Is It Legal to Download Facebook Videos?</h2>
            <p>Downloading videos for personal use is generally acceptable. However:</p>
            <ul>
                <li>Respect copyright laws</li>
                <li>Don't redistribute downloaded content without permission</li>
                <li>Only download videos you have rights to</li>
            </ul>
        </section>
        
        <footer>
            <div class="footer-links">
                <a href="privacy.html">Privacy Policy</a>
                <a href="terms.html">Terms of Service</a>
                <a href="contact.html">Contact Us</a>
                <a href="dmca.html">DMCA</a>
            </div>
            <p>&copy; <?php echo date("Y"); ?> Facebook Video Downloader. All rights reserved.</p>
            <p>This service is not affiliated with Facebook.</p>
        </footer>
    </div>
    
    <!-- Structured Data for SEO -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebApplication",
      "name": "Facebook Video Downloader",
      "url": "https://yourwebsite.com/",
      "description": "Free tool to download Facebook videos in HD quality without watermark.",
      "applicationCategory": "Utility",
      "operatingSystem": "All",
      "offers": {
        "@type": "Offer",
        "price": "0",
        "priceCurrency": "USD"
      }
    }
    </script>
</body>
</html>