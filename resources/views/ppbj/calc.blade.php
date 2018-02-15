 <table id="myTable" class="table table-bordered">
  <thead>
    <tr>
      <th>Ticket</th>
      <th>Price</th>
      <th>Quantity</th>
      <th><span id="subtotal" class="subtotal">Subtotal</span></th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <td colspan="2"></td>
      <td><span>TOTAL</span></td>
      <!-- Fix: Moved the total field to the right place -->
      <td class="total"></td>
    </tr>
  </tfoot>
  <tbody>
    <tr>
      <td>Adult</td>
      <td><span id="price" class="price">£8.25</span></td>
      <td>
        <select class="form-control" id="qty" name="qty">
         <option value="0">0</option>
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
         <option value="6">6</option>
         <option value="7">7</option>
         <option value="8">8</option>
         <option value="9">9</option>
       </select>  
     </td>
     <td><span id="subtotal" class="subtotal">£0</span></td>
   </tr>
   <tr>
    <td>Junior</td>
    <td><span id="price" class="price">£6.75</span></td>
    <td>
      <select class="form-control" name="qty">
       <option value="0">0</option>
       <option value="1">1</option>
       <option value="2">2</option>
       <option value="3">3</option>
       <option value="4">4</option>
       <option value="5">5</option>
       <option value="6">6</option>
       <option value="7">7</option>
       <option value="8">8</option>
       <option value="9">9</option>
     </select> 
   </td>
   <td><span id="subtotal" class="subtotal">£0</span></td>
 </tr>
 <tr>
  <td>Senior</td>
  <td><span id="price" class="price">£6.75</span></td>
  <td>
    <select class="form-control" name="qty">
     <option value="0">0</option>
     <option value="1">1</option>
     <option value="2">2</option>
     <option value="3">3</option>
     <option value="4">4</option>
     <option value="5">5</option>
     <option value="6">6</option>
     <option value="7">7</option>
     <option value="8">8</option>
     <option value="9">9</option>
   </select> 
 </td>
 <td><span id="subtotal" class="subtotal">£0</span></td>
</tr>
<tr>
  <td>Student</td>
  <td><span id="price" class="price">£6.75</span> </td>
  <td>
    <select class="form-control" name="qty">
     <option value="0">0</option>
     <option value="1">1</option>
     <option value="2">2</option>
     <option value="3">3</option>
     <option value="4">4</option>
     <option value="5">5</option>
     <option value="6">6</option>
     <option value="7">7</option>
     <option value="8">8</option>
     <option value="9">9</option>
   </select> 
 </td>
 <td><span id="subtotal" class="subtotal">£0</span></td>
</tr>
</tbody>
</table>
<script type="text/javascript">
  $(document).ready(function () {
    update_amounts();
    // Fix: Invalid selector for the select fields
    $('select[name=qty]').change(update_amounts);
  });

  function update_amounts() {
    var sum = 0.0;
    $('#myTable > tbody  > tr').each(function () {
      var qty = $(this).find('option:selected').val();
        // Fix: price is in text, not in a form field
        // and it must be cleaned from the pound sign
        var price = $(this).find('.price').text().replace(/[^\d.]/, '');
        var amount = (qty * price);
        sum += amount;
        $(this).find('.subtotal').text('£' + amount);
      });

    //just update the total to sum  
    $('.total').text('£' + sum);
  }
</script>
</html>