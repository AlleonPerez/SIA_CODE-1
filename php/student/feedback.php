<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Page</title>
   
    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <style>
        body {
            background-color: white;
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .feedback-container {
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 8px;
            max-width: 400px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
            position: relative; /* Make position relative to place the close button */
        }

        .feedback-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #000;
        }

        .feedback-container p {
            margin-bottom: 20px;
            color: #333;
        }

        /* Close Button Styling */
        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: #aaa;
        }

        .close-btn:hover {
            color: #000; /* Change color on hover */
        }

        /* Star rating styling */
        .star-rating {
            direction: rtl;
            font-size: 2rem;
            unicode-bidi: bidi-override;
            width: fit-content;
            margin: 0 auto;
        }

        .star-rating input[type="radio"] {
            display: none;
        }

        .star-rating label {
            color: #ccc;
            font-size: 30px;
            padding: 0;
            cursor: pointer;
            transition: color 0.2s ease-in-out;
        }

        .star-rating input[type="radio"]:checked ~ label {
            color: #f8ce0b;
        }

        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #f8ce0b;
        }

        .textarea-container textarea {
            width: 100%;
            height: 100px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            resize: none;
            font-size: 14px;
        }

        .btn-container {
            margin-top: 20px;
        }

        /* Send and Cancel button styles */
        .btn-send, .btn-cancel {
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.3s ease;
            font-weight: bold;
            font-size: 16px;
            width: 120px;
        }

        /* Send button styling */
        .btn-send {
            background-color: #0d6efd; /* Blue */
            color: white;
        }

        .btn-send:hover {
            background-color: #084298; /* Darker Blue on Hover */
        }

        /* Cancel button styling */
        .btn-cancel {
            background-color: #6c757d; /* Gray */
            color: white;
        }

        .btn-cancel:hover {
            background-color: #5a6268; /* Darker Gray on Hover */
        }

    </style>
</head>
<body>
    <div class="feedback-container">
        <!-- <button class="close-btn" onclick="closeFeedback()">×</button> -->
        <h1>Give Feedback</h1>
        <p>What do you think about this tool?</p>

        <!-- Star Rating System -->
        <div class="star-rating">
            <input type="radio" name="rating" id="star5" value="5">
            <label for="star5">&#9733;</label>
            <input type="radio" name="rating" id="star4" value="4">
            <label for="star4">&#9733;</label>
            <input type="radio" name="rating" id="star3" value="3">
            <label for="star3">&#9733;</label>
            <input type="radio" name="rating" id="star2" value="2">
            <label for="star2">&#9733;</label>
            <input type="radio" name="rating" id="star1" value="1">
            <label for="star1">&#9733;</label>
        </div>

        <!-- Feedback Textarea -->
        <div class="textarea-container">
            <p>Do you have any thoughts you'd like to share?</p>
            <textarea placeholder="Type your feedback here..."></textarea>
        </div>

        <!-- Submit and Cancel Buttons -->
        <div class="btn-container">
            <button class="btn-send">Send</button>
            <a href="../../php/student/home.php"><button type="button" class="btn-cancel">Cancel</button></a>
        </div>
    </div>

    <script src="../SIA/js/bootstrap.bundle.min.js" ></script>
    <script src="../SIA/js/bootstrap.min.js"></script>

    <script>
        // Optional: Handle the star rating interaction
        const ratingStars = document.querySelectorAll('.star-rating input');
        ratingStars.forEach(star => {
            star.addEventListener('change', (event) => {
                console.log(`Rated: ${event.target.value} stars`);
            });
        });

       
    </script>
</body>
</html>
