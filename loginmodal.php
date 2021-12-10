<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Log In</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="_login.php" method="post">
                    <label for="username" class="form-control bg-info my-3">Enter Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                    <label for="password" class="form-control bg-info my-3">Enter Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                    <input type="submit" value="Submit" class="btn btn-info d-block fs-5 mx-auto my-3">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>