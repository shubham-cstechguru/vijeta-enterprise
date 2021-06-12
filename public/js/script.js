
$(window).scroll(function(){
  var sticky = $('.nav_1'),
  scroll = $(window).scrollTop();

  if (scroll >= 100) {
    sticky.addClass('fixed');
    sticky.addClass('show');
  }
  else{
    sticky.removeClass('fixed');
    sticky.removeClass('show');
  }
});



function openNav() {
  document.getElementById("mySidenav").style.width = "320px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}




$(document).ready(function () {
  $('#add-to-cart').click(function (e) {
    e.preventDefault();

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    var product_id = $(this).closest('.prodbtn').find('.product_id').val();
    var quantity = $(this).closest('.prodbtn').find('.qty-input').val();
    var lense = $("input[name='exampleRadios']:checked").val();
    var prod_var_id = $("input[name='exampleRadios']:checked").data('value');
    var mirror = $("input[name='exampleCheck']:checked").val();
    var url = $(this).closest('.prodbtn').find('.url').val();

    // alert(lense+mirror);

    $.ajax({
      url: url,
      method: "POST",
      data: {
        'mirror_id': mirror,
        'lense_id': lense,
        'qty': quantity,
        'product_id': product_id,
        'prod_var_id': prod_var_id
      },
      success: function(response) {
          window.location = "http://127.0.0.1:8000/cart";
      },
    });
  });
});

$(function(){
 $(document).on('click','#remove_item', function () {
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var id = $(this).data('id');
  var url = $(this).data('url');
  $.ajax({
          type: 'DELETE',
          url: url,
          data: {'_token': $('input[name=_token]').val()},
          success: function (data) {
            location.reload();
          }
    });
  });

  /**
   * Lense & Mirror Selection
   * Accordion
   */
  $(document).on('click', '#custom-accordion .lense-input', function () {
    var sel = $('#custom-accordion .lense-input:checked');
    $(sel).closest('.form-check').next('.mirror-group').slideDown();
    $('#custom-accordion .lense-input').not(sel).closest('.form-check').next('.mirror-group').slideUp();
    $('#custom-accordion .lense-input').not(sel).closest('.form-check').next('.mirror-group').find('input[type=checkbox]').prop('checked', false);
  });
});




/*
* Multi page form
*/

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("add-to-cart").innerHTML = "Add To Cart";
  } else {
    document.getElementById("add-to-cart").innerHTML = "Select Lens"
  }
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}
