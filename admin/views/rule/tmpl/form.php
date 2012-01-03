<?php defined('_JEXEC') or die('Restricted access'); ?>

<form action="index.php" method="post" name="adminForm" id="adminForm">
    <div class="col100">
        <fieldset class="adminform">
            <legend>Rule fields</legend>

            <table class="admintable">
                <tr>
                    <td width="100" align="right" class="key">
                        <label for="body">Body</label>
                    </td>
                    <td>
                        <input style="color:darkgreen; font-size:20pt;"
                               class="text_area"
                               type="text" name="body"
                               id="body"
                               height="20"
                               size="80"
                               value="<?php echo $this->rule->body; ?>" />
                    </td>
                </tr>
            </table>
        </fieldset>
    </div>
    <div class="clr"></div>

    <input type="hidden" name="option" value="com_production_system" />
    <input type="hidden" name="id" value="<?php echo $this->rule->id; ?>" />
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="controller" value="rules" />
</form>