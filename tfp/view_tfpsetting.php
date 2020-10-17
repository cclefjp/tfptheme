<div class="wrap">
    <h2> Theme for Programmerの設定 </h2>
    <form method="post", action="options.php">

    <?php settings_fields('tfp_settings'); ?>
    <?php do_settings_sections('tfp_settings'); ?>

    <!-- ここから各フィールドの設定 -->
    <table class="form-table">
        <tbody>

            <tr>
            <th scope="row">
            <label for="tfp_logo_img">ロゴ画像</label>
            </th>
            <td>
            <?php echo get_site_url() . '/'; ?>
            </td>
            <td>
            <input type="text" id="tfp_logo_img" class="regular-text" name="tfp_logo_img" value="<?php echo get_option('tfp_logo_img'); ?>">
            </td>
            </tr>

            <tr>
            <th scope="row">
                <label for="tfp_copyright_statement">著作権表示文章</label>
            </th>
            <td>
            <input type="text" id="tfp_copyright_statement" class="regular-text" name="tfp_copyright_statement" value="<?php echo get_option('tfp_copyright_statement'); ?>">
            </td>
            </tr>

        </tbody>
    </table>

    <?php submit_button(); ?>
    </form>
</div> <!-- wrap -->
