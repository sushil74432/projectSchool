<?php 
    include_once("header.php"); 
    if($_GET['chapter'] != "undefined")
    $chapter = $_GET['chapter'];
?>
<div class="content p-3">
    <h2>Test title</h2>
    <div class="test-block">
        <p>Question no. 1 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

        <form>
            <input type="radio" name="answer" value="Option 1"><span class="mr-5">Option 1</span>
            <input type="radio" name="answer" value="Option 2"><span class="mr-5">Option 2</span>
            <input type="radio" name="answer" value="Option 3"><span class="mr-5">Option 3</span>
            <input type="radio" name="answer" value="Option 4"><span class="mr-5">Option 4</span>
        </form>
    </div>

    <div class="options mt-5">
        <button type="button" class="btn btn-info btn-lg">View lesson</button>
        <button type="button" class="btn btn-info btn-lg">View Marks</button>
    </div>
</div>

<?php include_once("footer.php"); ?>