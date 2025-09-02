<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title"><?= $title; ?></h5>
            <a href="<?= base_url('book/download_report_pdf'); ?>" class="btn btn-danger mb-3"><i class="bi bi-file-earmark-pdf"></i> Download PDF</a>
        </div>
        <div class="card-body">
            <?php if ($this->session->flashdata('message')) : ?>
                <?= $this->session->flashdata('message'); ?>
            <?php endif; ?>
            <ul class="nav nav-tabs mb-3" id="reportTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="borrow-tab" data-bs-toggle="tab" href="#borrow" role="tab">Borrowed Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="return-tab" data-bs-toggle="tab" href="#return" role="tab">Returned Books</a>
                </li>
                
            </ul>

            <div class="tab-content" id="reportTabContent">
                <!-- Borrowed Books -->
                <div class="tab-pane fade show active" id="borrow" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="borrowTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Cover</th>
                                    <th>Title</th>
                                    <th>Quantity</th>
                                    <th>Borrow Date</th>
                                    <th>Return Date</th>
                                    <th>Status</th>
                                    <th>User</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($borrowed_books as $b) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><img src="<?= base_url('assets/img/cover_image/' . $b['cover_image']); ?>" width="40"></td>
                                        <td><?= $b['title']; ?></td>
                                        <td><?= $b['quantity']; ?></td>
                                        <td><?= date('M d, Y', strtotime($b['borrow_date'])); ?></td>
                                        <td><?= date('M d, Y', strtotime($b['return_date'])); ?></td>
                                        <td><span class="badge bg-primary"><?= $b['status']; ?></span></td>
                                        <td>
                                            <img src="<?= base_url('assets/img/avatar_image/' . $b['avatar_image']); ?>" class="rounded-circle" width="30">
                                            <?= $b['first_name'] . ' ' . $b['last_name']; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Returned Books -->
                <div class="tab-pane fade" id="return" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="returnTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Cover</th>
                                    <th>Title</th>
                                    <th>Quantity</th>
                                    <th>Borrow Date</th>
                                    <th>Requested Return</th>
                                    <th>Approved Return</th>
                                    <th>Status</th>
                                    <th>Fine</th>
                                    <th>User</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($returned_books as $r) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><img src="<?= base_url('assets/img/cover_image/' . $r['cover_image']); ?>" width="40"></td>
                                        <td><?= $r['title']; ?></td>
                                        <td><?= $r['quantity']; ?></td>
                                        <td><?= date('M d, Y', strtotime($r['borrow_date'])); ?></td>
                                        <td><?= date('M d, Y', strtotime($r['request_return_date'])); ?></td>
                                        <td><?= $r['return_date'] ? date('M d, Y', strtotime($r['return_date'])) : '-'; ?></td>
                                        <td><span class="badge bg-success"><?= $r['status']; ?></span></td>
                                        <td><?= $r['fine_amount'] ? '₱' . number_format($r['fine_amount'], 2) : '-'; ?></td>
                                        <td>
                                            <img src="<?= base_url('assets/img/avatar_image/' . $r['avatar_image']); ?>" class="rounded-circle" width="30">
                                            <?= $r['first_name'] . ' ' . $r['last_name']; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>