import { __ } from '@wordpress/i18n';
import { useBlockProps, PlainText } from '@wordpress/block-editor';

export default function Edit({ attributes, setAttributes }) {
  const { title, description } = attributes;

  return (
    <div {...useBlockProps()}>
      <PlainText
        tagName="h2"
        className="h2 mb-4"
        value={title}
        onChange={(value) => setAttributes({ title: value })}
        placeholder={__('Title…', 'textdomain')}
      />
      <PlainText
        tagName="p"
        className="paragraph"
        value={description}
        onChange={(value) => setAttributes({ description: value })}
        placeholder={__('Description…', 'textdomain')}
      />
    </div>
  );
}
