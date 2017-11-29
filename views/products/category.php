<h1 align="center">Category</h1>
<?php
if (!empty($types)) {
?>
<div class="container">
    <h1 align="center">All types</h1>
    <hr>
    <div class="table-responsive">
        <table class = 'table table-condensed table-striped'>
            <tbody>
            <?php
            foreach ($types as $type) {
                ?>
                <tr>
                    <td><a target="_blank" href="?controller=products&action=showByType&type=<?php echo $type['type_name'];?>"><?php echo $type['type_name']; ?></a><td>
                    <td><?php echo $type['type_detail']; ?></td>
                </tr>
                <?php
            }
}
?>
            </tbody>
        </table>
    </div>
</div>