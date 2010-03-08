<form action="<?php echo url_for('sfGuardAuth/signin') ?>" method="post">
  <table>
    <caption>INGRESO</caption>
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


