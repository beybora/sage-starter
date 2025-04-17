import { __ } from '@wordpress/i18n';
import { useBlockProps, PlainText } from '@wordpress/block-editor';

export default function Edit({ attributes, setAttributes }) {
	const { headline, subheadline } = attributes;

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
				Upcoming Events – Block Settings
			</div>

			{/* Headline */}
			<div style={{ marginBottom: '1rem' }}>
				<strong style={{ display: 'block', marginBottom: '0.25rem', fontSize: '0.875rem', color: '#4b5563' }}>
					{__('Headline', 'custom-gutenberg-blocks')}
				</strong>
				<PlainText
					style={{
						border: '1px solid #ccc',
						borderRadius: '0.5rem',
						padding: '0.75rem 1rem',
						fontSize: '1rem',
						width: '100%',
					}}
					value={headline}
					onChange={(value) => setAttributes({ headline: value })}
					placeholder={__('Add a headline…', 'custom-gutenberg-blocks')}
				/>
			</div>

			{/* Subheadline */}
			<div style={{ marginBottom: '1.5rem' }}>
				<strong style={{ display: 'block', marginBottom: '0.25rem', fontSize: '0.875rem', color: '#4b5563' }}>
					{__('Subheadline', 'custom-gutenberg-blocks')}
				</strong>
				<PlainText
					style={{
						border: '1px solid #ccc',
						borderRadius: '0.5rem',
						padding: '0.75rem 1rem',
						fontSize: '1rem',
						width: '100%',
					}}
					value={subheadline}
					onChange={(value) => setAttributes({ subheadline: value })}
					placeholder={__('Add a subheadline…', 'custom-gutenberg-blocks')}
				/>
			</div>
		</div>
	);
}
