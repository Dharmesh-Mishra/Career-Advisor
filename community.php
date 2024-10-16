<?php
// Initialize the session
session_start();

error_reporting(0);
// Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    // Redirect to login page if not logged in
    header("location: login.php");
    exit;
}

// Fetch the user_id from the session if logged in
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

if (!$user_id) {
    // Handle the case where user_id is not found in the session
    echo "Error: User ID is not set. Please log in.";
    exit;
}

// Include config file
require_once "config.php";

// Add post
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_post"])) {
    $content = trim($_POST["content"]);
    if (!empty($content)) {
        $sql = "INSERT INTO posts (user_id, content) VALUES (?, ?)";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "is", $_SESSION["id"], $content);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    }
}

// Add comment
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_comment"])) {
    $post_id = $_POST["post_id"];
    $comment = trim($_POST["comment"]);
    if (!empty($comment)) {
        $sql = "INSERT INTO comments (post_id, user_id, comment) VALUES (?, ?, ?)";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "iis", $post_id, $_SESSION["id"], $comment);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    }
}

// Delete post
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_post"])) {
    $post_id = $_POST["post_id"];
    $sql = "DELETE FROM posts WHERE id = ? AND user_id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "ii", $post_id, $_SESSION["id"]);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}

// Delete comment
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_comment"])) {
    $comment_id = $_POST["comment_id"];
    $sql = "DELETE FROM comments WHERE id = ? AND user_id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "ii", $comment_id, $_SESSION["id"]);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}

// Fetch all posts
$sql = "SELECT p.id, p.content, p.created_at, u.username FROM posts p JOIN users u ON p.user_id = u.id ORDER BY p.created_at DESC";
$posts = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'?>
		<!-- Hero-area -->
		<div class="hero-area section">

			

		</div>
		<!-- /Hero-area -->

<div class="container mt-5">
<h2 class="text-center my-4">Explore, Share, and Learn: A Community for Career Development</h2>

<!-- Form to add a new post -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="mb-4">
    <div class="form-group">
        <textarea name="content" class="form-control" rows="3" placeholder="What's on your mind?" required></textarea>
    </div>
    <div class="form-group text-right">
        <input type="submit" class="btn btn-primary" name="add_post" value="Post">
    </div>
</form>

<hr>

<!-- Display posts -->
<?php while ($post = mysqli_fetch_assoc($posts)): ?>
    <div class="card mb-4 shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0"><?php echo htmlspecialchars($post["username"]); ?></h5>
            <small class="text-muted">Posted on <?php echo $post["created_at"]; ?></small>
        </div>
        <div class="card-body">
            <p class="card-text"><?php echo htmlspecialchars($post["content"]); ?></p>
            
            <?php if ($_SESSION["id"] == $post["user_id"]): ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="display:inline;">
                    <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                    <button type="submit" name="delete_post" class="btn btn-danger btn-sm">Delete</button>
                </form>
            <?php endif; ?>

            <!-- View Comments Button -->
            <button class="btn btn-link btn-sm mt-3" type="button" data-toggle="collapse" data-target="#comments<?php echo $post['id']; ?>" aria-expanded="false" aria-controls="comments<?php echo $post['id']; ?>">
                View Comments
            </button>

            <!-- Comments section (Initially collapsed) -->
            <div class="collapse mt-3" id="comments<?php echo $post['id']; ?>">
                <?php
                $sql = "SELECT c.id, c.comment, c.created_at, u.username FROM comments c JOIN users u ON c.user_id = u.id WHERE c.post_id = ? ORDER BY c.created_at ASC";
                $stmt = mysqli_prepare($link, $sql);
                mysqli_stmt_bind_param($stmt, "i", $post["id"]);
                mysqli_stmt_execute($stmt);
                $comments = mysqli_stmt_get_result($stmt);
                ?>

                <!-- Display comments -->
                <div class="comments-section">
                    <?php while ($comment = mysqli_fetch_assoc($comments)): ?>
                        <div class="media mb-3 border-bottom pb-2">
                            <div class="media-body">
                                <h6 class="mt-0 font-weight-bold"><?php echo htmlspecialchars($comment["username"]); ?></h6>
                                <p><?php echo htmlspecialchars($comment["comment"]); ?></p>
                                <p><small class="text-muted">Commented on <?php echo $comment["created_at"]; ?></small></p>

                                <?php if ($_SESSION["id"] == $comment["user_id"]): ?>
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="display:inline;">
                                        <input type="hidden" name="comment_id" value="<?php echo $comment['id']; ?>">
                                        <button type="submit" name="delete_comment" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>

                    <!-- Form to add a new comment -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                        <div class="form-group">
                            <textarea name="comment" class="form-control" rows="2" placeholder="Add a comment" required></textarea>
                        </div>
                        <div class="form-group text-right">
                            <input type="submit" class="btn btn-secondary btn-sm" name="add_comment" value="Comment">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; ?>

</div>
		
		
		<!-- Footer -->
		<footer id="footer" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<!-- footer logo -->
					<div class="col-md-6">
						<div class="footer-logo">
							<a class="logo" style="font-size: 30px;" href="main.html">Career Advisor</a>
						</div>
					</div>
					<!-- footer logo -->


				</div>
				<!-- /row -->

				<!-- row -->
				<div id="bottom-footer" class="row">

					<!-- social -->
					<div class="col-md-4 col-md-push-8">
						
					</div>
					<!-- /social -->

					<!-- copyright -->
					<div class="col-md-8 col-md-pull-4">
						<div class="footer-copyright">
							<span>&copy; Copyright 2024. All Rights Reserved. </span>
						</div>
					</div>
					<!-- /copyright -->

				</div>
				<!-- row -->

			</div>
			<!-- /container -->

		</footer>
		<!-- /Footer -->
		
		<!-- preloader -->
		<div id='preloader'><div class='preloader'></div></div>
		<!-- /preloader -->


		<!-- jQuery Plugins -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
		<script type="text/javascript" src="js/google-map.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</body>
</html>


<?php
// Close the database connection
mysqli_close($link);
?>

