<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">Tickets</h5>
            <a class="btn btn-danger" href="<?= base_url('admin/tickets/'.$ticket['id']); ?>" >Back</a>
        </div>
        <div class="card-body">
            <div class="container">
                <h3>Ticket #<?= $ticket['id']; ?> - <?= $ticket['subject']; ?></h3>
                <p><strong>Member:</strong> <?= $ticket['member_name']; ?></p>
                <p>Status: <span class="badge badge-<?= $ticket['status']=='open'?'success':'secondary'; ?>">
                    <?= ucfirst($ticket['status']); ?></span>
                </p>
                <p><strong>Created:</strong> <?= $ticket['created_at']; ?></p>
                <hr>
                <?= $this->session->flashdata('message'); ?>

                    <div class="card mb-4">
                        <div class="card-header">Conversation</div>
                        <div class="card-body" style="max-height:400px; overflow-y:auto;">
                            <p><strong><?= $ticket['member_name']; ?>:</strong> <?= $ticket['message']; ?><br>
                            <small class="text-muted"><?= $ticket['created_at']; ?></small></p>
                            <hr>

                            <?php foreach($replies as $r): ?>
                                <?php if($r['is_admin']): ?>
                                    <div class="alert alert-info text-right">
                                        <strong>Admin:</strong> <?= $r['message']; ?><br>
                                        <small class="text-muted"><?= $r['created_at']; ?></small>
                                    </div>
                                    <?php else: ?>
                                        <div class="alert alert-secondary">
                                            <strong><?= $ticket['member_name']; ?>:</strong> <?= $r['message']; ?><br>
                                            <small class="text-muted"><?= $r['created_at']; ?></small>
                                        </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <?php if($ticket['status']=='open'): ?>
                        <form method="post">
                            <div class="form-group">
                                <label>Your Reply</label>
                                <textarea name="message" class="form-control"><?= set_value('message'); ?></textarea>
                                <?= form_error('message', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <button class="btn btn-success">Send Reply</button>
                            <a href="<?= base_url('admin/close_ticket/'.$ticket['id']); ?>" class="btn btn-danger">Close Ticket</a>
                        </form>
                        <?php else: ?>
                            <div class="alert alert-warning">This ticket is closed. You cannot reply.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>