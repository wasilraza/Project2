<!-- Aihan Mahmood 2112260 5-E -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
    <style>
        .highlight {
            background-color: yellow;
            font-weight: bold;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: silver;
        }

        #header {
            background-color: black;
            color: white;
            text-align: center;
            padding: 20px;
        }

        #container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px;
        }

        #search-box {
            flex-basis: 100%;
            background-color: black;
            color: white;
            padding: 10px;
            margin-bottom: 20px;
        }

        #profile-image {
            flex: 0 0 200px;
            padding: 20px;
        }

        .box {
            flex: 1;
            background-color: black;
            color: white;
            padding: 20px;
            margin-left: 20px;
        }

        #experience,
        #info {
            flex-basis: 100%;
            background-color: black;
            color: white;
            padding: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div id="header" style="height: 20px;">
        <h1>Your Profile</h1>
    </div>

    <div id="search-box">
        <form method="post" action="">
            <input type="text" name="search" placeholder="Search..." value="<?php echo isset($_POST['search']) ? htmlspecialchars($_POST['search']) : ''; ?>">
            <button type="submit">Search</button>
        </form>
    </div>

    <div id="container">
        <div id="profile-image">
            <img src="https://img.freepik.com/premium-vector/people-profile-graphic_24911-21373.jpg" alt="Your Profile Image" width="200">
        </div>
        <div class="box">
            <h2>Personal Information</h2>
            <?php
            $personal_info = "<p>Name: Aihan Mahmood</p>";
            $personal_info .= "<p>Contact Number: 03213616263</p>";
            $personal_info .= "<p>Email: aihanmahmood33@gmail.com</p>";
            $personal_info .= "<p>Date of Birth: March 3, 2003</p>";
            if (isset($_POST['search'])) {
                $search_query = $_POST['search'];
                $word_count = str_word_count($search_query);
                echo "<p>Word count: $word_count</p>";
                $highlighted_personal_info = highlightWordInText($personal_info, $search_query);
                echo $highlighted_personal_info;
            } else {
                echo $personal_info;
            }
            ?>
        </div>
    </div>

    <div id="experience">
        <h2>Education</h2>
        <?php
        $experience = "<p>I pursued my O levels at APS, where I laid a strong foundation for my academic journey. Following that, I completed my A levels at Cedar College, where I honed my critical thinking and analytical skills. Currently, I am pursuing my undergraduate studies at SZABIST, where I am further expanding my knowledge and preparing for a promising future. My diverse educational experiences have not only enriched my academic prowess but have also equipped me with a well-rounded perspective on various subjects.</p>";
        if (isset($_POST['search'])) {
            $search_query = $_POST['search'];
            $highlighted_experience = highlightWordInText($experience, $search_query);
            echo $highlighted_experience;
        } else {
            echo $experience;
        }
        ?>
    </div>
    <div id="info">
        <h2>Info</h2>
        <?php
        $info = "<p>I have a passion for a wide range of interests and hobbies, including coding, which allows me to express my creativity through technology. Photography is another love of mine, capturing moments and memories in a single frame. Behind the wheel, I find solace in the art of driving, exploring new horizons. Gaming is a thrilling escape, particularly in the realm of e-sports, where I compete and strategize. Beyond these passions, I aspire to build a successful software house, combining my skills and enthusiasm to create innovative solutions for the future.</p>";
        if (isset($_POST['search'])) {
            $search_query = $_POST['search'];
            $highlighted_info = highlightWordInText($info, $search_query);
            echo $highlighted_info;
        } else {
            echo $info;
        }
        ?>
    </div>
</body>
</html>

<?php
function highlightWordInText($text, $word) {
    $highlighted = '<span class="highlight">' . $word . '</span>';
    return str_ireplace($word, $highlighted, $text);
}
?>
