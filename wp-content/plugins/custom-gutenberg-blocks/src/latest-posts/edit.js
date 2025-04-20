import { useBlockProps, RichText, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl, SelectControl } from '@wordpress/components';

const postTypes = [
	{ label: 'Blogposts', value: 'post' },
	{ label: 'Pressemitteilungen', value: 'press_release' },
	{ label: 'Events', value: 'event' },
];

const variants = [
	{ label: 'Light', value: 'light' },
	{ label: 'Dark', value: 'dark' },
	{ label: 'Light Gray', value: 'light-gray' },
];

export default function Edit({ attributes, setAttributes }) {
	const { headline, subheadline, postType, variant } = attributes;

	return (
		<>
			<InspectorControls>
				<PanelBody title="Einstellungen">
					<TextControl
						label="Überschrift"
						value={headline}
						onChange={(val) => setAttributes({ headline: val })}
					/>
					<TextControl
						label="Subheadline"
						value={subheadline}
						onChange={(val) => setAttributes({ subheadline: val })}
					/>
					<SelectControl
						label="Post Type"
						value={postType}
						options={postTypes}
						onChange={(val) => setAttributes({ postType: val })}
					/>
					<SelectControl
						label="Darstellung"
						value={variant}
						options={variants}
						onChange={(val) => setAttributes({ variant: val })}
					/>
				</PanelBody>
			</InspectorControls>

			<div
				{...useBlockProps({
					className: 'editor-box',
					style: {
						border: '1px solid #ccc',
						backgroundColor: variant === 'dark' ? '#E30C17' : '#fafafa',
						color: variant === 'dark' ? '#ffffff' : '#1A1A1A',
						borderRadius: '0.5rem',
						padding: '1.5rem',
						marginBottom: '1.5rem',
						boxShadow: '0 1px 3px rgba(0,0,0,0.05)',
					},
				})}
			>
				<div style={{ fontWeight: 'bold', fontSize: '0.9rem', marginBottom: '1rem' }}>
					Latest Posts Section
				</div>

				<div style={{ marginBottom: '1rem', textAlign: 'center' }}>
					<RichText
						tagName="h2"
						value={headline}
						onChange={(val) => setAttributes({ headline: val })}
						placeholder="Überschrift eingeben"
						style={{
							fontSize: '1.875rem',
							fontWeight: '700',
							lineHeight: '1.2',
							marginBottom: '0.5rem',
						}}
					/>
				</div>

				<div style={{ marginBottom: '2rem', textAlign: 'center' }}>
					<RichText
						tagName="p"
						value={subheadline}
						onChange={(val) => setAttributes({ subheadline: val })}
						placeholder="Subheadline eingeben"
						style={{
							fontSize: '1.125rem',
							color: '#4b5563',
							lineHeight: '1.6',
							marginTop: '0.25rem',
						}}
					/>
				</div>

				<div
					style={{
						display: 'grid',
						gridTemplateColumns: 'repeat(auto-fit, minmax(100px, 1fr))',
						gap: '1.5rem',
					}}
				>
					{[...Array(3)].map((_, i) => (
						<div
							key={i}
							style={{
								height: '220px',
								backgroundColor: '#e5e7eb',
								borderRadius: '0.75rem',
								boxShadow: '0 1px 2px rgba(0,0,0,0.05)',
							}}
						/>
					))}
				</div>
			</div>
		</>
	);
}
