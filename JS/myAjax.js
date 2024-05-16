// When the document is ready.
$(document).ready(function () {

  // Ajax code for reading data from the database.
  function showData() {
    $.ajax({
      url: '/Utility/retrieve.php',
      method: 'get',
      dataType: 'json',
      success: function (data) {
        let output = '';
        for (i = 0; i < data.length; i++) {
          output += "<tr><td>" + data[i].id + "</td><td>" + data[i].name + "</td><td>" + data[i].email + "</td><td>" + data[i].password + "</td><td><button class='btn btn-warning' id='btnedit' data-sid=" + data[i].id + ">Edit</button> <button class='btn btn-danger' id='btndel' data-sid=" + data[i].id + ">Delete</button></td></tr>";
        }
        $('#tbody').html(output);
      }
    });
  }

  // On clicking the add task btn.
  $('#btnadd').click(function (e) {
    e.preventDefault();
    let id = $('#stid').val();
    let nm = $('#nameid').val();
    let em = $('#emailid').val();
    let ps = $('#passwordid').val();
    if(!checkInputs(nm, em, ps)) return;
    let myData = { id: id, name: nm, email: em, pass: ps };
    // Ajax code to add a new task.
    $.ajax({
      url: "./Utility/insert.php",
      method: "post",
      data: myData,
      success: function (response) {
        $('#msg').html(response);
        showData();
      },
      error: function (xhr, status, error) {
        $('#msg').html(error);
        alert(error);
      }
    });
    $('#stid').val('');
    $('#nameid').focus();
    $('#myForm')[0].reset();
  });

  // Data from the database is displayed on page refresh.
  showData();

  // Ajax code for deleting a task.
  $('#tbody').on("click", "#btndel", function() {
    let id = $(this).attr("data-sid");
    let myData = {id: id};
    mythis = this;
    $.ajax({
      url: 'Utility/delete.php',
      method: 'post',
      data: myData,
      success: function(data) {
        console.log(data);
        $(mythis).closest('tr').fadeOut();
        $('#msg').html(data);
      }
    });
  });

  // Ajax Code for editing an entry.
  $('#tbody').on("click", "#btnedit", function() {
    let id = $(this).attr('data-sid');
    myData = {id: id};
    $.ajax({
      url : 'Utility/edit.php',
      method: 'post',
      data: myData,
      dataType: 'json',
      success: function(data) {
        $('#stid').val(data.id);
        $('#nameid').val(data.name);
        $('#emailid').val(data.email);
        $('#passwordid').val(data.password);
      }
    });
  });
});

// Function to implement search.
function myfun1() {
  let given = $('#mytxt').val();
  myData = {
    name: given
  }
  let output = '';
  $.ajax({
    url: 'Utility/search.php',
    method: 'post',
    data: myData,
    dataType: 'json',
    success: function (data) {
      console.log(data);
      for (i = 0; i < data.length; i++) {
        output += "<tr><td>" + data[i].id + "</td><td>" + data[i].name + "</td><td>" + data[i].email + "</td><td>" + data[i].password + "</td><td><button class='btn btn-warning' id='btnedit' data-sid=" + data[i].id + ">Edit</button> <button class='btn btn-danger' id='btndel' data-sid=" + data[i].id + ">Delete</button></td></tr>";
      }
      $('#tbody').html(output);
    },
    error: function(xhr, status, error) {
      alert(error);
    }
  });
}

// Function to check the inputs. 
function checkInputs(name, email, password) {
  alert(password.length);
  if(password.length < 8) {
    $('#msg').html("Password mustbe atleast 8 characters long.");
    return false;
  }
  return true;
}

