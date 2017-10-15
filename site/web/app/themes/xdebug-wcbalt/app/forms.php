<?php

namespace App;

/**
 * Gravity Forms : Check if file is attached
 *
 * Send a different notification email depending on whether a file is attached or not.
 *
 * For some reason the file upload field is not available to use with conditional logic
 * when processing a gravity forms submission. So you cannot by default do something
 * like perform one action if a file is attached and perform another if it is not.
 *
 * A work around is to se the form up with with a hidden administrative field, type radio
 * button, choices Yes or No, default No.
 *
 * The field is set as administrative so it is hidden on the front end, and it is set to
 * allow auto-population.
 *
 * This function uses the gform_pre_submission_filter hook to check if a file has been
 * uploaded, if there is a file it sets the hidden radio button to Yes.
 *
 * Conditional logic can be based on this field.
 *
 * @param $form
 *
 * @return mixed
 *
 * @see https://docs.gravityforms.com/gform_pre_submission_filter/
 */

add_filter('gform_pre_submission_filter', function ($form) {
    // Go through any available file fields.
    // There is only 1 available per form, and it would have been
    // possible to just target the file upload field by ID, but this
    // seemed a *little* more future proof as it'll catch the file upload fields
    // regardless of ID.
    foreach ($_FILES as $file) {
        // See if a file is attached.
        $file_attached = false;
        // if the size variable is not 0 a file is attached
        if ($file['size'] !== 0) {
            $file_attached = true;
        }
    }
    // go through the available fields
    foreach ($form['fields'] as $field) {
        // we are looking for a field with the ID 5
        // it's an administrative field, so will not appear on the front end
        $field_id = 7;
        if ($field->id != $field_id) {
            // move on if no match
            continue;
        }
        // This is the choices array from the $form object
        $choices = $field['choices'];
        // we need to switch up if a resume is attached
        if ($file_attached) {
            // Resume is attached, so update values in the choices array
            $choices[0]['isSelected'] = true;
            $choices[1]['isSelected'] = false;
            // Changing the above doesn't seem to do much, but I'm leaving it as is regardless.
            // Now update the value of this field in the $_POST variable
            $_POST['input_7'] = "Yes";
        } else {
            // Otherwise make sure $_POST is set to No
            $_POST['input_7'] = "No";
        }
    }

    // send the form back to finish processing
    return $form;
});
