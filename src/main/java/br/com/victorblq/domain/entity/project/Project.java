package br.com.victorblq.domain.entity.project;

import java.time.LocalDateTime;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.validation.constraints.NotEmpty;

import br.com.victorblq.domain.entity.AbstractEntity;
import lombok.Data;
import lombok.EqualsAndHashCode;
import lombok.NoArgsConstructor;

/**
 * 
 * @author Victor Carvalho
 *
 * @version 1.0.0
 * @since 1.0.0, Jan 9, 2019
 */
@Data
@Entity
@EqualsAndHashCode(callSuper=true)
@NoArgsConstructor
public class Project extends AbstractEntity{

	private static final long serialVersionUID = -5456131536610885533L;
	
	@NotEmpty
	@Column(nullable=false, length=100)
	private String title;
	
	@Column(columnDefinition = "TEXT")
	private String description;
	
	@Column(columnDefinition = "TEXT")
	private String link;
	
	@Column(columnDefinition = "TEXT")
	private String image;
	
	@Column
	private LocalDateTime startDate;
	
	@Column
	private LocalDateTime endDate;
	
}
