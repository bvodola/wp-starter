const { registerBlockType } = wp.blocks;

registerBlockType('bvodola/custom-cta', {
  // built-in attributes
  title: 'Call to Action',
  description: 'Block that generates a CTA',
  icon: 'format-image',
  category: 'layout',

  // custom attributes
  attributes: {},

  // custom functions

  // built-in functions
  edit() {
    return <div>Hello World</div>;
  },
  save() {}
});
