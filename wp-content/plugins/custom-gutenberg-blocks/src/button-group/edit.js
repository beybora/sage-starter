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
	{ label: 'Light Gray', value: 'light-gray' }
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
				<PanelBody title={__('Block Settings', 'textdomain')}>
					<SelectControl
						label={__('Color Variant', 'textdomain')}
						value={variant}
						options={variantOptions}
						onChange={(val) => setAttributes({ variant: val })}
					/>
				</PanelBody>
			</InspectorControls>

			<div {...useBlockProps()}>
				<PlainText
					value={title}
					onChange={(value) => setAttributes({ title: value })}
					placeholder={__('Enter title...', 'textdomain')}
					style={{ padding: '1rem', fontSize: '1.5rem' }}
				/>

				{links.map((link, index) => (
					<div key={index} style={{ marginBottom: '1rem' }}>
						<PlainText
							value={link.label}
							onChange={(value) => updateLink(index, 'label', value)}
							placeholder={__('Link label...', 'textdomain')}
						/>

						{/* Media Upload */}
						<MediaUploadCheck>
							<MediaUpload
								onSelect={(media) => updateLink(index, 'url', media.url)}
								allowedTypes={['application/pdf', 'image', 'audio', 'video']}
								render={({ open }) => (
									<Fragment>
										<Button onClick={open} variant="secondary" style={{ marginTop: '0.5rem' }}>
											{__('Select File from Media Library', 'textdomain')}
										</Button>
										{link.url && (
											<p style={{ marginTop: '0.5rem' }}>
												<a href={link.url} target="_blank" rel="noopener noreferrer">
													{__('View File', 'textdomain')}
												</a>
											</p>
										)}
									</Fragment>
								)}
							/>
						</MediaUploadCheck>

						<Button variant="secondary" onClick={() => removeLink(index)}>
							{__('Remove Link', 'textdomain')}
						</Button>
					</div>
				))}

				{links.length < 5 && (
					<Button variant="primary" onClick={addLink}>
						{__('Add New Link', 'textdomain')}
					</Button>
				)}
			</div>
		</>
	);
}
