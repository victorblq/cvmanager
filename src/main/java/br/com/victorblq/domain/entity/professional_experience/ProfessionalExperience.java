package br.com.victorblq.domain.entity.professional_experience;

import java.time.LocalDateTime;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.validation.constraints.NotEmpty;
import javax.validation.constraints.NotNull;

import br.com.victorblq.domain.entity.AbstractEntity;
import lombok.Data;
import lombok.EqualsAndHashCode;
import lombok.NoArgsConstructor;

/**
 * 
 * @author Victor Carvalho
 *
 * @version 1.0.0
 * @since 1.0.0, Jan 7, 2019
 */
@Data
@Entity
@EqualsAndHashCode(callSuper=true)
@NoArgsConstructor
public class ProfessionalExperience extends AbstractEntity{

	private static final long serialVersionUID = 3981604388902532643L;
	
	@NotEmpty
	@Column(length=100, nullable=false)
	private String title;
	
	@NotEmpty
	@Column(length=50, nullable=false)
	private String role;
	
	@Column(columnDefinition="TEXT")
	private String description;
	
	@NotEmpty
	@Column(length=100, nullable=false)
	private String company;
	
	@NotNull
	@Column(nullable=false)
	private LocalDateTime startDate;
	
	@NotNull
	@Column(nullable=false)
	private LocalDateTime endDate;
}
