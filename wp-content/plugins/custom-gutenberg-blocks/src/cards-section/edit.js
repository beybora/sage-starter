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
];

export default function Edit({ attributes, setAttributes }) {
	const { title, subtitle, variant, cards = [] } = attributes;

	const updateCard = (index, field, value) => {
		const updated = [...cards];
		updated[index][field] = value;
		setAttributes({ cards: updated });
	};

	const addCard = () => {
		if (cards.length >= 3) return;
		setAttributes({
			cards: [...cards, { icon: '', headline: '', text: '' }],
		});
	};

	const removeCard = (index) => {
		const updated = cards.filter((_, i) => i !== index);
		setAttributes({ cards: updated });
	};

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Einstellungen', 'textdomain')}>
					<SelectControl
						label={__('Farbvariante', 'textdomain')}
						value={variant}
						options={variantOptions}
						onChange={(val) => setAttributes({ variant: val })}
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
				{/* Titel + Subline */}
				<strong style={{ display: 'block', marginBottom: '0.5rem' }}>
					{__('Titel', 'textdomain')}
				</strong>
				<PlainText
					value={title}
					onChange={(val) => setAttributes({ title: val })}
					placeholder={__('Titel eingeben...', 'textdomain')}
					style={{ padding: '0.75rem 1rem', minHeight: '48px', marginBottom: '1rem' }}
				/>

				<strong style={{ display: 'block', marginBottom: '0.5rem' }}>
					{__('Subline (optional)', 'textdomain')}
				</strong>
				<PlainText
					value={subtitle}
					onChange={(val) => setAttributes({ subtitle: val })}
					placeholder={__('Subline eingeben...', 'textdomain')}
					style={{ padding: '0.75rem 1rem', minHeight: '48px' }}
				/>

				{/* Cards */}
				{cards.map((card, index) => (
					<div
						key={index}
						style={{
							marginTop: '1.5rem',
							padding: '1rem',
							border: '1px solid #e5e7eb',
							borderRadius: '0.5rem',
							backgroundColor: '#fff',
							boxShadow: '0 1px 2px rgba(0,0,0,0.03)',
						}}
					>
						<strong style={{ display: 'block', marginBottom: '0.5rem' }}>
							{__('Icon (Bild)', 'textdomain')}
						</strong>
						<MediaUploadCheck>
							<MediaUpload
								onSelect={(media) => updateCard(index, 'icon', media.url)}
								allowedTypes={['image']}
								render={({ open }) => (
									<Fragment>
										{card.icon ? (
											<img
												src={card.icon}
												alt=""
												style={{
													width: '60px',
													height: '60px',
													objectFit: 'contain',
													marginBottom: '0.5rem',
												}}
											/>
										) : (
											<div
												style={{
													width: '60px',
													height: '60px',
													backgroundColor: '#f3f4f6',
													border: '1px dashed #ccc',
													borderRadius: '0.5rem',
													display: 'flex',
													alignItems: 'center',
													justifyContent: 'center',
													color: '#9ca3af',
													fontSize: '0.75rem',
													marginBottom: '0.5rem',
												}}
											>
												{__('Kein Icon', 'textdomain')}
											</div>
										)}
										<Button variant="secondary" onClick={open}>
											{__('Icon auswählen', 'textdomain')}
										</Button>
									</Fragment>
								)}
							/>
						</MediaUploadCheck>

						<strong style={{ display: 'block', marginTop: '1rem' }}>
							{__('Card Headline', 'textdomain')}
						</strong>
						<PlainText
							value={card.headline}
							onChange={(val) => updateCard(index, 'headline', val)}
							placeholder={__('Überschrift...', 'textdomain')}
							style={{ padding: '0.75rem 1rem', minHeight: '48px' }}
						/>

						<strong style={{ display: 'block', marginTop: '1rem' }}>
							{__('Card Text', 'textdomain')}
						</strong>
						<PlainText
							value={card.text}
							onChange={(val) => updateCard(index, 'text', val)}
							placeholder={__('Text eingeben...', 'textdomain')}
							style={{ padding: '0.75rem 1rem', minHeight: '60px' }}
						/>

						<Button
							variant="secondary"
							onClick={() => removeCard(index)}
							style={{ marginTop: '1rem' }}
						>
							{__('Card entfernen', 'textdomain')}
						</Button>
					</div>
				))}

				{cards.length < 3 && (
					<Button variant="primary" onClick={addCard} style={{ marginTop: '2rem' }}>
						{__('Neue Card hinzufügen', 'textdomain')}
					</Button>
				)}
			</div>
		</>
	);
}
