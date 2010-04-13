<?php use_helper('I18N') ?>
<form action="<?php echo url_for('sfGuardAuth/signin') ?>" method="post">
  <table class="orange">
    <caption><?php echo __('Login'); ?></caption>
    <?php echo $form ?>
  
 <tfoot>
      <tr>
        <td colspan="2">
          <input type="submit" value="Aceptar" />
        </td>
      </tr>
    </tfoot>
  </table>
</form>


