import { useBlockProps, RichText, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';

export default function Edit({ attributes, setAttributes }) {
	const { headline, subheadline } = attributes;

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
				</PanelBody>
			</InspectorControls>

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
					Latest Posts Section
				</div>

				{/* Headline */}
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

				{/* Subheadline */}
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

				{/* Grid Placeholder */}
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
