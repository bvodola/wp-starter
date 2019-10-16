const { registerBlockType } = wp.blocks;

registerBlockType('bvodola/new-block', {
  // built-in attributes
  title: 'New Block',
  description: 'Block that generates a CTA',
  icon: 'format-image',
  category: 'layout',

  // custom attributes
  attributes: {},

  // custom functions

  // built-in functions
  edit() {
    return <div>New block</div>;
  },
  save() {}
});
