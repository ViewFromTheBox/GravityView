<?php
/**
 * The default quiz grade field output template.
 *
 * @since future
 */
$value = $gravityview->value;
$form = $gravityview->view->form->form;

// If there's no grade, don't continue
if ( gv_empty( $value, false, false ) ) {
	return;
}

// Check if grading is enabled for the form. If not set, default to false.
$grading_type_enabled = ! empty( $form['gravityformsquiz']['grading'] ) ? $form['gravityformsquiz']['grading'] : 'none';

if ( 'letter' === $grading_type_enabled ) {
	echo $value;
} elseif ( GVCommon::has_cap( 'gravityforms_edit_forms' ) ) {
	$grade_type = __( 'Letter', 'gravityview' );
	printf( esc_html_x( '%s grading is disabled for this form. %sChange the setting%s', '%s is the current Quiz field type ("Letter" or "Pass/Fail")', 'gravityview' ), $grade_type, '<a href="'. admin_url('admin.php?page=gf_edit_forms&amp;view=settings&amp;subview=gravityformsquiz&amp;id='.$form['id'] ) . '">', '</a>' );
}