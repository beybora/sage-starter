import { __ } from '@wordpress/i18n';
import {
  useBlockProps,
  PlainText,
  MediaUpload,
  MediaUploadCheck,
} from '@wordpress/block-editor';
import { Button } from '@wordpress/components';
import { Fragment } from '@wordpress/element';

export default function Edit({ attributes, setAttributes }) {
  const { title, subtitle, cards = [] } = attributes;

  const updateCard = (index, field, value) => {
    const updated = [...cards];
    updated[index][field] = value;
    setAttributes({ cards: updated });
  };

  const addCard = () => {
    if (cards.length >= 4) return;
    setAttributes({
      cards: [...cards, { imageUrl: '', title: '', description: '' }],
    });
  };

  const removeCard = (index) => {
    const updated = cards.filter((_, i) => i !== index);
    setAttributes({ cards: updated });
  };

  return (
    <div
      {...useBlockProps({
        className: 'editor-box',
        style: {
          border: '1px solid #ccc',
          backgroundColor: '#fafafa',
          borderRadius: '0.5rem',
          padding: '1.5rem',
          marginBottom: '1.5rem',
          boxShadow: '0 1px 3px rgba(0,0,0,0.05)',
        },
      })}
    >
      {/* Section Label */}
      <div style={{ fontWeight: 'bold', fontSize: '0.9rem', marginBottom: '1rem', color: '#374151' }}>
        Card Grid Section Settings
      </div>

      {/* Title */}
      <div style={{ marginBottom: '1rem' }}>
        <strong style={{ display: 'block', marginBottom: '0.25rem', fontSize: '0.875rem', color: '#4b5563' }}>
          {__('Section Title', 'textdomain')}
        </strong>
        <PlainText
          style={{
            border: '1px solid #ccc',
            borderRadius: '0.5rem',
            padding: '0.75rem 1rem',
            fontSize: '1rem',
            width: '100%',
            minHeight: '50px',
            resize: 'none',
            lineHeight: '1.5',
          }}
          value={title}
          onChange={(value) => setAttributes({ title: value })}
          placeholder={__('Add a section title...', 'textdomain')}
        />
      </div>

      {/* Subtitle */}
      <div style={{ marginBottom: '1.5rem' }}>
        <strong style={{ display: 'block', marginBottom: '0.25rem', fontSize: '0.875rem', color: '#4b5563' }}>
          {__('Section Subtitle', 'textdomain')}
        </strong>
        <PlainText
          style={{
            border: '1px solid #ccc',
            borderRadius: '0.5rem',
            padding: '0.75rem 1rem',
            fontSize: '1rem',
            width: '100%',
            minHeight: '50px',
            resize: 'none',
            lineHeight: '1.5',
          }}
          value={subtitle}
          onChange={(value) => setAttributes({ subtitle: value })}
          placeholder={__('Add a section subtitle...', 'textdomain')}
        />
      </div>

      {/* Cards */}
      {cards.map((card, index) => (
        <div
          key={index}
          style={{
            marginBottom: '1rem',
            padding: '1rem',
            border: '1px solid #e5e7eb',
            borderRadius: '0.5rem',
            backgroundColor: '#ffffff',
          }}
        >
          {/* Image */}
          <div style={{ marginBottom: '1rem' }}>
            <strong style={{ display: 'block', marginBottom: '0.25rem', fontSize: '0.875rem', color: '#4b5563' }}>
              {__('Image/Icon', 'textdomain')}
            </strong>
            <MediaUploadCheck>
              <MediaUpload
                onSelect={(media) => updateCard(index, 'imageUrl', media.url)}
                allowedTypes={['image']}
                render={({ open }) => (
                  <Fragment>
                    {card.imageUrl ? (
                      <img
                        src={card.imageUrl}
                        alt=""
                        style={{
                          marginBottom: '0.5rem',
                          borderRadius: '0.5rem',
                          width: '4rem',
                          height: '4rem',
                          objectFit: 'contain',
                          border: '1px solid #e5e7eb',
                          display: 'block',
                        }}
                      />
                    ) : (
                      <div
                        style={{
                          marginBottom: '0.5rem',
                          width: '4rem',
                          height: '4rem',
                          backgroundColor: '#f3f4f6',
                          color: '#9ca3af',
                          borderRadius: '0.5rem',
                          display: 'flex',
                          alignItems: 'center',
                          justifyContent: 'center',
                          fontSize: '0.75rem',
                          border: '1px dashed #d1d5db',
                        }}
                      >
                        {__('No image', 'textdomain')}
                      </div>
                    )}
                    <Button onClick={open} variant="secondary" size="small">
                      {__('Select / Replace', 'textdomain')}
                    </Button>
                  </Fragment>
                )}
              />
            </MediaUploadCheck>
          </div>

          {/* Card Title */}
          <div style={{ marginBottom: '1rem' }}>
            <strong style={{ display: 'block', marginBottom: '0.25rem', fontSize: '0.875rem', color: '#4b5563' }}>
              {__('Card Title', 'textdomain')}
            </strong>
            <PlainText
              style={{
                border: '1px solid #ccc',
                borderRadius: '0.5rem',
                padding: '0.75rem 1rem',
                fontSize: '1rem',
                width: '100%',
                minHeight: '50px',
                resize: 'none',
                lineHeight: '1.5',
              }}
              value={card.title}
              onChange={(value) => updateCard(index, 'title', value)}
              placeholder={__('Add title...', 'textdomain')}
            />
          </div>

          {/* Card Description */}
          <div style={{ marginBottom: '1rem' }}>
            <strong style={{ display: 'block', marginBottom: '0.25rem', fontSize: '0.875rem', color: '#4b5563' }}>
              {__('Description', 'textdomain')}
            </strong>
            <PlainText
              style={{
                border: '1px solid #ccc',
                borderRadius: '0.5rem',
                padding: '0.75rem 1rem',
                fontSize: '1rem',
                width: '100%',
                minHeight: '120px',
                resize: 'none',
                lineHeight: '1.5',
              }}
              value={card.description}
              onChange={(value) => updateCard(index, 'description', value)}
              placeholder={__('Add description...', 'textdomain')}
            />
          </div>

          {/* Remove */}
          <Button variant="secondary" onClick={() => removeCard(index)}>
            {__('Remove Card', 'textdomain')}
          </Button>
        </div>
      ))}

      {/* Add Card */}
      {cards.length < 4 && (
        <Button variant="primary" onClick={addCard}>
          {__('Add Card', 'textdomain')}
        </Button>
      )}
    </div>
  );
}
