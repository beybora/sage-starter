import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	PlainText,
	MediaUpload,
	MediaUploadCheck,
	RichText
} from '@wordpress/block-editor';
import { Button } from '@wordpress/components';
import { Fragment } from '@wordpress/element';

export default function Edit({ attributes, setAttributes }) {
	const { imageUrl, headline, description, ctaText, ctaUrl } = attributes;

	const updateAttribute = (key, value) => {
		setAttributes({ [key]: value });
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
			<div style={{ fontWeight: 'bold', fontSize: '0.9rem', marginBottom: '1.5rem', color: '#374151' }}>
				Bild links – Text & CTA rechts
			</div>

			<div style={{ display: 'flex', gap: '1.5rem' }}>
				{/* Bildbereich */}
				<div style={{ flex: '1' }}>
					<strong style={{ display: 'block', marginBottom: '0.5rem', color: '#4b5563' }}>
						{__('Bild auswählen', 'textdomain')}
					</strong>
					<MediaUploadCheck>
						<MediaUpload
							onSelect={(media) => updateAttribute('imageUrl', media.url)}
							allowedTypes={['image']}
							render={({ open }) => (
								<Fragment>
									{imageUrl ? (
										<img
											src={imageUrl}
											alt=""
											style={{
												display: 'block',
												width: '100%',
												maxWidth: '200px',
												borderRadius: '0.5rem',
												marginBottom: '0.5rem',
												border: '1px solid #ddd',
											}}
										/>
									) : (
										<div
											style={{
												width: '200px',
												height: '120px',
												backgroundColor: '#f3f4f6',
												display: 'flex',
												alignItems: 'center',
												justifyContent: 'center',
												borderRadius: '0.5rem',
												border: '1px dashed #ccc',
												color: '#9ca3af',
												fontSize: '0.875rem',
											}}
										>
											{__('Kein Bild ausgewählt', 'textdomain')}
										</div>
									)}
									<Button onClick={open} variant="secondary">
										{__('Bild ändern', 'textdomain')}
									</Button>
								</Fragment>
							)}
						/>
					</MediaUploadCheck>
				</div>

				{/* Textbereich */}
				<div style={{ flex: '2', display: 'flex', flexDirection: 'column', gap: '1rem' }}>
					<RichText
						tagName="h2"
						value={headline}
						onChange={(val) => updateAttribute('headline', val)}
						placeholder="Überschrift eingeben"
						style={{
							fontSize: '1.5rem',
							fontWeight: '700',
						}}
					/>

					<PlainText
						value={description}
						onChange={(val) => updateAttribute('description', val)}
						placeholder="Beschreibung eingeben"
						style={{
							minHeight: '80px',
							padding: '0.75rem 1rem',
							border: '1px solid #ccc',
							borderRadius: '0.5rem',
							fontSize: '1rem',
						}}
					/>

					{/* CTA */}
					<div style={{ display: 'flex', gap: '1rem' }}>
						<PlainText
							value={ctaText}
							onChange={(val) => updateAttribute('ctaText', val)}
							placeholder="Button-Text"
							style={{
								flex: 1,
								border: '1px solid #ccc',
								padding: '0.5rem 1rem',
								borderRadius: '0.5rem',
							}}
						/>
						<PlainText
							value={ctaUrl}
							onChange={(val) => updateAttribute('ctaUrl', val)}
							placeholder="Button-URL"
							style={{
								flex: 2,
								border: '1px solid #ccc',
								padding: '0.5rem 1rem',
								borderRadius: '0.5rem',
							}}
						/>
					</div>
				</div>
			</div>
		</div>
	);
}
