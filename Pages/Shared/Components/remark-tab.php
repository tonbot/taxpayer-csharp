
<div class="tab-pane fade show bg-white py-4" id="nav-remark" role="tabpanel" aria-labelledby="nav-remark-tab" tabindex="0">

<div class="app-container">
    <h3 class="text-left">All Remarks</h3>


    <?php foreach ($remarks as $remark) : ?>
    <div class="remark">
        <div class="remark-header">
            <div class="remark-person"><?= $remark['first_name']. ' ' . $remark['last_name']?></div>
            <div class="remark-date"><?= $remark['created_at']?></div>
        </div>
        <div class="remark-text">
              <?= $remark['remark']?>
        </div>
    </div>
   <?php endforeach ?>
   
</div>
</div>


