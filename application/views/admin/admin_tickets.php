<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">Tickets</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-lg" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Fullname</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($tickets)) : ?>
                            <tr>
                                <td colspan="8" class="text-center">No pending tickets</td>
                            </tr>
                        <?php else : ?>
                            <?php $i = 1; foreach($tickets as $t) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $t['member_name']; ?></td>
                                    <td><?= $t['subject']; ?></td>
                                    <td><?= $t['status']; ?></td>
                                    <td><?= $t['created_at']; ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/view_ticket/'.$t['id']); ?>" class="btn btn-sm btn-info">View</a>
                                        <?php if($t['status']=='open'): ?>
                                            <a href="<?= base_url('admin/close_ticket/'.$t['id']); ?>" class="btn btn-sm btn-danger">Close</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


