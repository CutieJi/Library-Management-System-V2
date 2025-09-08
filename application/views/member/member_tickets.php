<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">Tickets</h5>
         </div>
         <div class="card-body">
            <div class="container">
                <h3>My Ticket</h3>
                <?= $this->session->flashdata('message'); ?>

                <form method="post" class="mb-4">
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" name="subject" class="form-control" value="<?= set_value('subject'); ?>">
                        <?= form_error('subject', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea name="message" class="form-control"><?= set_value('message'); ?></textarea>
                        <?= form_error('message', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <button class="btn btn-success">Submit Ticket</button>
                </form>

                <div class="table-responsive">
                    <table class="table table-hover table-lg" id="table1">
                        <thead>
                            <tr>
                                <th>Ticket No.</th>
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
                                    <?php $t['id'] = 1; foreach($tickets as $t) : ?>
                                        <tr>
                                            <td><?= $t['id']; ?></td>
                                            <td><?= $t['subject']; ?></td>
                                            <td><?= ucfirst($t['status']); ?></td>
                                            <td><?= $t['created_at']; ?></td>
                                            <td><a href="<?= base_url('member/view_ticket/'.$t['id']); ?>" class="btn btn-sm btn-info">View</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>