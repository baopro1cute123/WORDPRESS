<div class="wrap">
    <h1 class="wp-heading-inline">
        <?= __('Manage Orders','wp-ecommerce');?>
    </h1>
    <hr class="wp-header-end">
    <ul class="subsubsub">
        <li class="all"><a href="http://localhost/WebWordPress/wp-admin/admin.php?page=wp_orders" class="current">
                <?= __('All','wp-ecommerce');?>
                <span class="count">(3)</span></a> |
        </li>
        <li class="publish">
            <a href="http://localhost/WebWordPress/wp-admin/admin.php?page=wp_orders&status=pending">
                <?= __('New Orders','wp-ecommerce');?>
            </a> |
        </li>
        <li class="publish">
            <a href="http://localhost/WebWordPress/wp-admin/admin.php?page=wp_orders&status=completed">
                <?= __('Competed Orders','wp-ecommerce');?></a> |
        </li>
        <li class="publish">
            <a href="http://localhost/WebWordPress/wp-admin/admin.php?page=wp_orders&status=canceled">
                <?= __('Canceled Orders','wp-ecommerce');?>
            </a>
        </li>
    </ul>
    <form id="posts-filter" method="get">
        <input type="hidden" name="page" value="wp_orders">
        <!-- <input type="hidden" name="paged" value="1"> -->
        <p class="search-box">
            <label class="screen-reader-text" for="post-search-input"> <?= __('Search Orders','wp-ecommerce');?></label>
            <input type="search" id="post-search-input" name="s" value="">
            <input type="submit" id="search-submit" class="button" value=" <?= __('Search Orders','wp-ecommerce');?>">
        </p>
        <div class="tablenav top">
            <div class="alignleft actions bulkactions">
                <label for="bulk-action-selector-top" class="screen-reader-text">Lựa chọn thao tác hàng loạt</label>
                <select name="action" id="bulk-action-selector-top">
                    <option value="-1">Hành động</option>
                    <option value="trash">Bỏ vào thùng rác</option>
                </select>
                <input type="submit" id="doaction" class="button action" value="Áp dụng">
            </div>
            <div class="alignleft actions">
                <label class="screen-reader-text" for="cat">Lọc theo danh mục</label>
                <select name="status" id="cat" class="postform">
                    <option value="0">Tất cả trạng thái</option>
                    <option class="level-0" value="pending">Đơn hàng mới</option>
                    <option class="level-0" value="completed">Đơn đã hoàn thành</option>
                    <option class="level-0" value="canceled">Đơn đã hủy</option>
                </select>
                <input type="submit" id="post-query-submit" class="button" value="Lọc">
            </div>
            <?php include WP_PATH . 'includes/template/elements/elm-paginate.php'; ?>
            <br class="clear">
        </div>
        <h2 class="screen-reader-text">Danh sách bài viết</h2>
        <table class="wp-list-table widefat fixed striped table-view-list posts">
            <thead>
                <tr>
                    <td id="cb" class="manage-column column-cb check-column">
                        <label class="screen-reader-text" for="cb-select-all-1">Chọn toàn bộ</label>
                        <input id="cb-select-all-1" type="checkbox">
                    </td>
                    <th class="manage-column column-primary">Mã đơn hàng</th>
                    <th class="manage-column">Tổng tiền</th>
                    <th class="manage-column">Khách hàng</th>
                    <th class="manage-column">Điện thoại</th>
                    <th class="manage-column">Trạng thái</th>
                    <th class="manage-column">Thời gian</th>
                </tr>
            </thead>
            <tbody id="the-list">
                <?php foreach ($items as $key => $item) : ?>
                <tr id="post-<?= $item->id; ?>"
                    class="iedit author-self level-0 post-<?= $item->id; ?> status-publish hentry">
                    <th scope="row" class="check-column">
                        <input id="cb-select-3" type="checkbox" name="post[]" value="<?= $item->id; ?>">
                    </th>
                    <td class="title column-title has-row-actions column-primary page-title" data-colname="Tiêu đề">
                        <strong><a class="row-title"
                                href="http://localhost/WebWordPress/wp-admin/admin.php?page=wp_orders&order_id=<?= $item->id; ?>">#
                                <?= $item->id; ?></a></strong>
                    </td>
                    <td><?= number_format($item->total); ?></td>
                    <td><?= $item->customer_name; ?></td>
                    <td><?= $item->customer_phone; ?></td>
                    <td>
                        <select name="" id="" class="order_status" data-id="<?= $item->id; ?>">
                            <option <?= $item->status == 'pending' ? 'selected' : ''; ?> selected="" value="pending">Đơn
                                hàng mới</option>
                            <option <?= $item->status == 'completed' ? 'selected' : ''; ?> value="completed">Đơn đã hoàn
                                thành</option>
                            <option <?= $item->status == 'canceled' ? 'selected' : ''; ?> value="canceled">Đơn đã hủy
                            </option>
                        </select>
                    </td>
                    <td class="date column-date"><?= date('d-m-Y', strtotime($item->created)); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td id="cb" class="manage-column column-cb check-column">
                        <label class="screen-reader-text" for="cb-select-all-1">Chọn toàn bộ</label>
                        <input id="cb-select-all-1" type="checkbox">
                    </td>
                    <th class="manage-column column-primary">Mã đơn hàng</th>
                    <th class="manage-column">Tổng tiền</th>
                    <th class="manage-column">Khách hàng</th>
                    <th class="manage-column">Điện thoại</th>
                    <th class="manage-column">Trạng thái</th>
                    <th class="manage-column">Thời gian</th>
                </tr>
            </tfoot>
        </table>
        <div class="tablenav bottom">
            <div class="alignleft actions bulkactions">
                <label for="bulk-action-selector-bottom" class="screen-reader-text">Lựa chọn thao tác hàng loạt</label>
                <select name="action2" id="bulk-action-selector-bottom">
                    <option value="-1">Hành động</option>
                    <option value="edit" class="hide-if-no-js">Chỉnh sửa</option>
                    <option value="trash">Bỏ vào thùng rác</option>
                </select>
                <input type="submit" id="doaction2" class="button action" value="Áp dụng">
            </div>
            <?php include WP_PATH . 'includes/template/elements/elm-paginate.php'; ?>
            <br class="clear">
        </div>
    </form>
</div>

<script>
// Đường dẫn sử dụng ajax

let nonce = '<?= wp_create_nonce('wp_update_order_status') ;?>';

let ajax_url = '<?= admin_url('admin-ajax.php');?>';
jQuery(document).ready(function() {
    jQuery('.order_status').on('change', function() {
        let order_id = jQuery(this).data('id');
        let status = jQuery(this).val();

        jQuery.ajax({
            url: ajax_url,
            method: 'POST',
            dataType: 'json',
            data: {
                order_id: order_id,
                status: status,
                action: 'wp_order_change_status',
                _nonce: nonce
            },
            success: function(res) {
                if (res.success === true) {
                    alert('Cập nhật trạng thái đơn hàng thành công')

                } else {
                    alert('Cập nhật trạng thái đơn hàng thất bại')

                }
            },
            error: function(error) {
                alert('Cập nhật trạng thái đơn hàng thất bại')
            }
        });
    });
});
</script>