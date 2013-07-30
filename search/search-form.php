<?php echo $this->form('search-form', $options['form_attributes']); ?>
    <?php if (!is_admin_theme()): ?>
        <div class="small-9 large-9 columns" />
            <span data-tooltip class="has-tip" title="Search must contain more than three letters">test
    <?php endif; ?>
                <?php echo $this->formText('query', $filters['query']); ?>
    <?php if (!is_admin_theme()): ?>
            </span>
        </div>
    <?php endif; ?>
    <?php if ($options['show_advanced']): ?>
    <fieldset id="advanced-form">
        <fieldset id="query-types">
            <p><?php echo __('Search using this query type:'); ?></p>
            <?php echo $this->formRadio('query_type', $filters['query_type'], null, $query_types); ?>
        </fieldset>
        <?php if ($record_types): ?>
        <fieldset id="record-types">
            <p><?php echo __('Search only these record types:'); ?></p>
            <?php foreach ($record_types as $key => $value): ?>
                <?php echo $this->formCheckbox('record_types[]', $key, in_array($key, $filters['record_types']) ? array('checked' => true, 'id' => 'record_types-' . $key) : null); ?> <?php echo $value; ?><br>
            <?php endforeach; ?>
        </fieldset>
        <?php elseif (is_admin_theme()): ?>
            <p><a href="<?php echo url('settings/edit-search'); ?>"><?php echo __('Go to search settings to select record types to use.'); ?></a></p>
        <?php endif; ?>
        <p><?php echo link_to_item_search(__('Advanced Search (Items only)')); ?></p>
    </fieldset>
    <?php endif; ?>
    <?php if (!is_admin_theme()): ?>
        <div class="small-3 large-3 columns" />
    <?php endif; ?>
    <?php echo $this->formSubmit(null, $options['submit_value']); ?>
    <?php if (!is_admin_theme()): ?>
        </div>
    <?php endif; ?>
</form>
