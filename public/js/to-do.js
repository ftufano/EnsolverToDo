/**
 * Function to get the values for each field in the form by ID on To-Do's form
 */
 $(document).ready(function(){ //run the function when the DOM is ready
    $('#selectFldrName').on('change', function(){ //run the feature when the selectFldrName change the selected option
  
      $id = $('#selectFldrName option:selected').val(); //encapsulate on the variable $id the selectFldrName option selected value
      
      $('#selectFldrID').val($id).change(); //change the selectFldrID option selected based on the $id value which is the same value as the addQuotaSsnSlct option selected
  
    });

    $('#edtSlctFldrName').on('change', function(){ //run the feature when the edtSlctFldrName change the selected option
  
        $id = $('#edtSlctFldrName option:selected').val(); //encapsulate on the variable $id the edtSlctFldrName option selected value
        
        $('#edtSlctFldrID').val($id).change(); //change the edtSlctFldrID option selected based on the $id value which is the same value as the addQuotaSsnSlct option selected

    });
  
    $('#selectFldrName').trigger('change'); //to run the function 'change' on the element load or refresh
    $('#edtSlctFldrName').trigger('change'); //to run the function 'change' on the element load or refresh
  
  });

/**
 * Function to change the To-Do's status value on the checkbox input
 */
function statusCheck(element) {
    $status = $(element).val();

    if ($status == 0){
        $(element).val(1);
    }else{
        $(element).val(0);
    }

    element.form.submit();
}

/**
 * Function to get an specific row info for edit a To-Do's info
 */
$('.edt-todo').click(function() {//Click on the button, for this specific function needs to call the element through class instead id attribute otherwise won't work
  
    $row = $(this).closest('tr');    // Find the row
    $id = $row.find('#toDoSttsID').val(); // Find the id text
    $description = $row.find('#toDoDesc').text(); // Find the description text
    $folderID = $row.find('#toDoFldrNm').val(); // Find the folder ID text
    
    return{ //set all info on each form field
        first: $('#inputEditId').val($id), //setting value of the input through its html id
        second: $('#inputEditToDoDesc').val($description), //setting value of the input through its html id
        third: $('#edtSlctFldrID').val($folderID).change(), //change the selectFldrID option selected based on the $id value
        fourth: $('#edtSlctFldrName').val($folderID).change() //change the selectFldrID option selected based on the $id value
    };
});

/**
 * Function to get an specific row info for delete a To-Do
 */
$('.dlt-todo').click(function() {//Click on the button, for this specific function needs to call the element through class instead id attribute otherwise won't work
    $row = $(this).closest('tr');    // Find the row
    $id = $row.find('#toDoSttsID').val(); // Find the id text
    $description = $row.find('#toDoDesc').text(); // Find the description text
  
    return{ //set all info on each form field
      first: $('#inputTDDltId').val($id), //setting value of the input through its html id
      second: $('#toDoDeleteModalDiv').html("Are you sure you want to delete the <b>" + $description +"</b> To-Do?") //setting the html content within the invoked div
    };
});

/**
 * Function to get an specific info for delete a Folder
 */
 $('.dlt-fldr').click(function() {//Click on the button, for this specific function needs to call the element through class instead id attribute otherwise won't work
    $input = $(this).siblings('input');    // Find the row
    $id = $input.val(); // Find the id text
  
    return{ //set all info on each form field
      first: $('#inputFDltId').val($id), //setting value of the input through its html id
      second: $('#folderDeleteModalDiv').html("<b>All To-Dos saved in this folder will be DELETED...</b> Are you sure you want to delete this folder anyway?") //setting the html content within the invoked div
    };
});