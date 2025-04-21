import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	PlainText,
	MediaUpload,
	MediaUploadCheck,
	InspectorControls
} from '@wordpress/block-editor';
import { PanelBody, SelectControl, Button } from '@wordpress/components';
import { Fragment } from '@wordpress/element';

const variantOptions = [
	{ label: 'Light', value: 'light' },
	{ label: 'Dark', value: 'dark' },
	{ label: 'Light Gray', value: 'light-gray' },
];

export default function Edit({ attributes, setAttributes }) {
	const { title, variant, links } = attributes;

	const updateLink = (index, field, value) => {
		const updated = [...links];
		updated[index][field] = value;
		setAttributes({ links: updated });
	};

	const addLink = () => {
		setAttributes({
			links: [...links, { url: '', label: '' }],
		});
	};

	const removeLink = (index) => {
		const updated = links.filter((_, i) => i !== index);
		setAttributes({ links: updated });
	};

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Einstellungen', 'custom-gutenberg-blocks')}>
					<SelectControl
						label={__('Farbvariante', 'custom-gutenberg-blocks')}
						value={variant}
						options={variantOptions}
						onChange={(val) => setAttributes({ variant: val })}
					/>
				</PanelBody>
			</InspectorControls>

			<div
				{...useBlockProps({
					className: 'editor-button-group',
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
				{/* Blocktitel */}
				<div style={{ fontWeight: 'bold', fontSize: '0.9rem', marginBottom: '1.5rem', color: '#374151' }}>
					{__('Button Group (Download Links)', 'custom-gutenberg-blocks')}
				</div>

				{/* Haupttitel */}
				<PlainText
					style={{
						border: '1px solid #ccc',
						borderRadius: '0.375rem',
						padding: '0.75rem 1rem',
						marginBottom: '1.5rem',
						minHeight: '48px',
						width: '100%',
					}}
					value={title}
					onChange={(value) => setAttributes({ title: value })}
					placeholder={__('Titel eingeben…', 'custom-gutenberg-blocks')}
				/>

				{/* Button-Links */}
				{links.map((link, index) => (
					<div
						key={index}
						style={{
							backgroundColor: '#fff',
							border: '1px solid #ddd',
							borderRadius: '0.5rem',
							padding: '1rem',
							marginBottom: '1rem',
							boxShadow: 'inset 0 0 0 1px rgba(0,0,0,0.02)',
						}}
					>
						<PlainText
							value={link.label}
							onChange={(value) => updateLink(index, 'label', value)}
							placeholder={__('Button Text (Label)', 'custom-gutenberg-blocks')}
							style={{
								border: '1px solid #ccc',
								borderRadius: '0.375rem',
								padding: '0.5rem 1rem',
								marginBottom: '1rem',
								width: '100%',
							}}
						/>

						<MediaUploadCheck>
							<MediaUpload
								onSelect={(media) => updateLink(index, 'url', media.url)}
								allowedTypes={['application/pdf', 'image', 'audio', 'video']}
								render={({ open }) => (
									<Fragment>
										<Button
											onClick={open}
											variant="secondary"
											style={{ marginBottom: '0.5rem' }}
										>
											{__('Datei auswählen oder ersetzen', 'custom-gutenberg-blocks')}
										</Button>
										{link.url && (
											<p style={{ marginTop: '0.5rem', fontSize: '0.875rem' }}>
												<a
													href={link.url}
													target="_blank"
													rel="noopener noreferrer"
													style={{ textDecoration: 'underline' }}
												>
													{__('Datei ansehen', 'custom-gutenberg-blocks')}
												</a>
											</p>
										)}
									</Fragment>
								)}
							/>
						</MediaUploadCheck>

						<Button
							isDestructive
							onClick={() => removeLink(index)}
							style={{ marginTop: '1rem' }}
						>
							{__('Diesen Button entfernen', 'custom-gutenberg-blocks')}
						</Button>
					</div>
				))}

				{links.length < 5 && (
					<Button variant="primary" onClick={addLink}>
						{__('Neuen Button hinzufügen', 'custom-gutenberg-blocks')}
					</Button>
				)}
			</div>
		</>
	);
}
