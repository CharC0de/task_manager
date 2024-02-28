<?php
include 'header.php';


$id = $_GET['id'] ?? '';
$title = $_GET['title'] ?? '';
$description = $_GET['description'] ?? '';
$priority = $_GET['priority'] ?? '';
$due_date = $_GET['due_date'] ?? '';

?>


<h1>
    <?php echo isset($_GET['edit']) ? 'Edit ' : 'Create ' ?>Task
</h1>
<a class="btn btn-primary" href="index.php"> back</a>
</header>
<main class="d-flex flex-row justify-content-center">
    <form class="w-25 d-flex flex-column" action="process.php" method="post">
        <input type="hidden" name="id" value='<?php echo $id ?>'>
        <div class="mb-3">
            <label for="" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="<?php echo $title ?>" aria-describedby="helpId" placeholder="Title" required />

        </div>
        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <textarea class="form-control" name="description" cols="30" rows="10"><?php echo $description ?></textarea>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Priorty</label>
            <select multiple class="form-select form-select-lg" name="priority" id="">
                <option <?php echo $priority === '' ? 'selected' : null ?> class="text-secondary">Select one</option>
                <option <?php echo $priority === 'low' ? 'selected' : null ?> value="low">Low</option>
                <option <?php echo $priority === 'medium' ? 'selected' : null ?> value="medium">Medium</option>
                <option <?php echo $priority === 'high' ? 'selected' : null ?> value="high">High</option>
            </select>
        </div>
        <div class="mb-3">

            <div class="form-outline flex-fill mb-0">
                <label class="form-label">Due Date:</label>
                <input type="date" class="form-control" name="due_date" value="<?php echo $due_date ?>" />
            </div>
        </div>
        <input type="submit" class="btn btn-primary" name="<?php echo isset($_GET['edit']) ? 'edit' : 'create' ?>" value="Submit">



    </form>
</main>

<?php
include 'footer.php';
?>